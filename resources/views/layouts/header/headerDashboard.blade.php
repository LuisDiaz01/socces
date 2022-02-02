<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header">
      <h2 class="page-title">@yield('nameTitleTemplate')</h2>
    </div>
  </div>
  <div class="col-12">
    <div class="page-header-toolbar">
      <div class="btn-group toolbar-item" role="group" aria-label="Basic example">
        @if (Session::has('messages'))
          {!! Session::get('messages') !!}
        @endif
        @if (Session::has('success'))
          {!! Session::get('success') !!}
        @endif
      </div>
    </div>
  </div>
</div>
@yield('headerContent')
<br>  