@if (Session::get('info'))
<div class="alert alert-info alert-has-icon alert-dismissible show fade">
    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
      <div class="alert-title">Informasi</div>
      {{ Session::get('info') }}
    </div>
</div>
@endif