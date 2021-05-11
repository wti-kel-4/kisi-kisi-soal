@if (Session::get('error'))
<div class="alert alert-warning alert-has-icon alert-dismissible show fade">
    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>×</span>
          </button>
      <div class="alert-title">Perhatian</div>
      {{ Session::get('error') }}
    </div>
</div>
@endif