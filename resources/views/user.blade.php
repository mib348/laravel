@include('layouts.header')

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">User Info</h3>
    </div>
    <div class="box-body">
    	<form id="input_form" class="form form-horizontal" action="{{ route('InsertUserData') }}" method="post">
    		<input type="hidden" id="nId" name="nId" value="{{ $id }}" />
    		{{ csrf_field() }}
    		<div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $name }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email }}" >

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autocomplete="off" value="" >

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Type</label>
                <div class="col-md-6">
                	<select id="type" name="type" class="form-control">
                		<option value="STANDARD" @if($type == "STANDARD") selected @endif>Standard</option>
                		<option value="ADMIN" @if($type == "ADMIN") selected @endif>Admin</option>
                	</select>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="button" class="btn btn-success save_btn">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
    	</form>
    </div>
<!--     <div class="box-footer"> -->
<!--     	<div class="btns pull-right"> -->
<!--     		<a class="btn btn-success save_btn">Save</a> -->
<!--     	</div> -->
<!--     </div> -->
  </div>
  <!-- /.box -->
  
  
<script type="text/javascript">
	$(function(){
        $(document).on("click", ".save_btn", function(){
        	$(".save_btn").attr("disabled", true);
        
        	if($("#name").val() != ""){
            	$('#input_form').ajaxSubmit({
            		beforeSend: function() {
            	    },
            	    uploadProgress: function(event, position, total, percentComplete) {
            	    },
            	    complete: function(xhr) {
            			if (typeof callback === "function")
            	            callback();

        	            window.location.replace("{{ route('users') }}");
            	    },
            	    iframe: true,
            	    dataType:  'json',
            	    async: false
            	});
        	}
        	else
        		showConfirmDialog("Please provide a name");
        });
    });
</script>

@include('layouts.footer')