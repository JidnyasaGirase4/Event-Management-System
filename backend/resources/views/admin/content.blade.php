@extends('admin.layout')
@section('title', $pageName)

@php
/* Renders the inner fields of one repeater item row. */
$renderRepeaterItem = function ($id, $index, $row, $schema) {
    $html = '<div class="repeater-item border rounded p-3 mb-3 bg-light position-relative">';
    $html .= '<button type="button" class="btn btn-sm btn-outline-danger repeater-remove position-absolute top-0 end-0 m-2"><i class="bi bi-x-lg"></i></button>';
    $html .= '<div class="row g-3">';
    foreach ($schema as $sub => $ftype) {
        $name  = "repeater[{$id}][{$index}][{$sub}]";
        $val   = $row[$sub] ?? '';
        $label = ucwords(str_replace('_', ' ', $sub));
        if ($ftype === 'image') {
            $html .= '<div class="col-12"><label class="form-label fw-semibold">' . $label . '</label><div class="d-flex align-items-center gap-3">';
            if ($val) {
                $html .= '<img src="' . e(media($val)) . '" class="thumb" alt="">';
            }
            $html .= '<input type="file" name="repeater_image[' . $id . '][' . $index . '][' . $sub . ']" accept="image/*" class="form-control">';
            $html .= '</div><input type="hidden" name="' . $name . '" value="' . e($val) . '"></div>';
        } elseif ($ftype === 'textarea') {
            $html .= '<div class="col-12"><label class="form-label fw-semibold">' . $label . '</label><textarea name="' . $name . '" rows="2" class="form-control">' . e($val) . '</textarea></div>';
        } else {
            $hint = $sub === 'icon' ? ' (Lucide name)' : '';
            $html .= '<div class="col-md-6"><label class="form-label fw-semibold">' . $label . $hint . '</label><input type="text" name="' . $name . '" value="' . e($val) . '" class="form-control"></div>';
        }
    }
    $html .= '</div></div>';
    return $html;
};
@endphp

@section('content')
<form method="POST" action="{{ route('admin.content.update', $page) }}" enctype="multipart/form-data">
  @csrf

  <div class="d-flex justify-content-between align-items-center mb-3">
    <p class="text-muted mb-0">Edit every section of this page — text, images, icons and card lists are all dynamic.</p>
    <button class="btn btn-brand"><i class="bi bi-save"></i> Save All Changes</button>
  </div>

  @foreach($sections as $section => $items)
    <details class="content-section" open>
      <summary><i class="bi bi-layers"></i> {{ ucwords(str_replace('_',' ', $section)) }} Section</summary>
      <div class="body">
        <div class="row g-3">
          @foreach($items as $item)
            @if($item->type === 'repeater')
              @php
                $schema = $repeaters["{$page}.{$item->section}.{$item->item_key}"] ?? ['title' => 'text', 'text' => 'textarea'];
                $rows   = json_decode($item->value, true) ?: [];
              @endphp
              <div class="col-12">
                <label class="form-label fw-semibold d-block">{{ $item->label ?: ucwords(str_replace('_',' ',$item->item_key)) }}</label>
                <div class="repeater" data-repeater-id="{{ $item->id }}">
                  <div class="repeater-items">
                    @foreach($rows as $ri => $row)
                      {!! $renderRepeaterItem($item->id, $ri, $row, $schema) !!}
                    @endforeach
                  </div>
                  <template class="repeater-tpl">{!! $renderRepeaterItem($item->id, '__i__', [], $schema) !!}</template>
                  <button type="button" class="btn btn-sm btn-outline-success repeater-add"><i class="bi bi-plus-lg"></i> Add Item</button>
                </div>
              </div>
            @else
              <div class="{{ $item->type === 'textarea' ? 'col-12' : 'col-md-6' }}">
                <label class="form-label fw-semibold">{{ $item->label ?: ucwords(str_replace('_',' ',$item->item_key)) }}</label>

                @if($item->type === 'image')
                  <div class="d-flex align-items-center gap-3">
                    @if($item->value)
                      <img src="{{ media($item->value) }}" class="thumb" alt="">
                    @endif
                    <input type="file" name="image[{{ $item->id }}]" accept="image/*" class="form-control">
                  </div>
                  <input type="hidden" name="value[{{ $item->id }}]" value="{{ $item->value }}">
                @elseif($item->type === 'textarea')
                  <textarea name="value[{{ $item->id }}]" rows="3" class="form-control">{{ $item->value }}</textarea>
                @else
                  <input type="text" name="value[{{ $item->id }}]" value="{{ $item->value }}" class="form-control">
                @endif
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </details>
  @endforeach

  <button class="btn btn-brand mt-2"><i class="bi bi-save"></i> Save All Changes</button>
</form>

<script>
  (function () {
    let uid = Date.now();
    document.querySelectorAll('.repeater').forEach(function (rep) {
      const list = rep.querySelector('.repeater-items');
      const tpl  = rep.querySelector('.repeater-tpl');
      rep.querySelector('.repeater-add').addEventListener('click', function () {
        const html = tpl.innerHTML.replace(/__i__/g, 'n' + (uid++));
        const wrap = document.createElement('div');
        wrap.innerHTML = html.trim();
        list.appendChild(wrap.firstChild);
      });
    });
    document.addEventListener('click', function (e) {
      const btn = e.target.closest('.repeater-remove');
      if (btn) { btn.closest('.repeater-item').remove(); }
    });
  })();
</script>
@endsection
