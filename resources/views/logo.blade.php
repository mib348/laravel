@include('layouts.header')

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Set Logo</h3>
    </div>
    <div class="box-body">
    	<form id="input_form" class="form form-horizontal" action="{{ url('/logo/new') }}" method="post">
    		{{ csrf_field() }}
    		<div class="form-group">
        		<div class="col-xs-3 text-right">
        			<label>Site Logo</label>
        		</div>
        		<div class="col-xs-9">
        			<input type="file" id="file" name="logo" />
        			@if(!empty($logo))
        			<br>
        			<div class="image">
        				<img alt="featured image" src="{{ asset('storage') . '/' . $logo }}" style="height:28vh;">
        			</div>
        			@endif
        		</div>
    		</div>
    		<div class="form-group">
        		<div class="col-xs-3 text-right">
        			<label>Favicon</label>
        		</div>
        		<div class="col-xs-9">
        			<input type="file" id="file" name="favicon" />
        			@if(!empty($favicon))
        			<br>
        			<div class="image">
        				<img alt="featured image" src="{{ asset('storage') . '/' . $favicon }}" style="height:28vh;">
        			</div>
        			@endif
        		</div>
    		</div>
    	</form>
    </div>
    <div class="box-footer">
    	<div class="btns pull-right">
    		<a class="btn btn-success save_btn">Save</a>
    	</div>
    </div>
  </div>
  <!-- /.box -->
  
  
<script type="text/javascript">
	$(function(){
        $(document).on("click", ".save_btn", function(){
        	$('#input_form').ajaxSubmit({
        		beforeSend: function() {
        	    },
        	    uploadProgress: function(event, position, total, percentComplete) {
        	    },
        	    complete: function(xhr) {
        			if (typeof callback === "function")
        	            callback();

    	            location.reload();
        	    },
        	    iframe: true,
        	    dataType:  'json',
        	    async: false
        	});
        });
    });
</script>

@include('layouts.footer')