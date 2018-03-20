@include('layouts.header')

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Pages Info</h3>
    </div>
    <div class="box-body">
    	<form id="input_form" class="form form-horizontal" action="{{ url('/pages/new') }}" method="post">
    		<input type="hidden" id="nId" name="nId" value="{{ $id }}" />
    		{{ csrf_field() }}
    		<div class="form-group">
        		<div class="col-xs-3 text-right">
        			<label>Title</label>
        		</div>
        		<div class="col-xs-9">
        			<input type="text" id="title" name="title" class="form-control"  value="{{ $title }}" required="required" maxlength="255" />
        		</div>
    		</div>
    		<div class="form-group">
        		<div class="col-xs-3 text-right">
        			<label>Excerpt</label>
        		</div>
        		<div class="col-xs-9">
        			<input type="text" id="excerpt" name="excerpt" class="form-control"  value="{{ $excerpt }}"  maxlength="255" />
        		</div>
    		</div>
    		<div class="form-group">
        		<div class="col-xs-3 text-right">
        			<label>Description</label>
        		</div>
        		<div class="col-xs-9">
        			<textarea rows="10" cols="5" id="description" name="description" class="form-control textarea">{{ $description }}</textarea>
        		</div>
    		</div>
    		<div class="form-group">
        		<div class="col-xs-3 text-right">
        			<label>Featured Image</label>
        		</div>
        		<div class="col-xs-9">
        			<input type="file" id="file" name="file" />
        			@if(!empty($image))
        			<br>
        			<div class="image">
        				<img alt="featured image" src="{{ asset('storage') . '/' . $id . '-' . $image }}" style="height:28vh;">
        			</div>
        			@endif
        		</div>
    		</div>
    		<div class="form-group">
        		<div class="col-xs-3 text-right">
        			<label>Set as HomePage</label>
        		</div>
        		<div class="col-xs-9">
        			<input type="checkbox" id="cb_homepage" name="cb_homepage" value="Y" @if($set_as_homepage == "Y") checked @endif />
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
        	$(".save_btn").attr("disabled", true);
        
        	if($("#title").val() != ""){
            	$('#input_form').ajaxSubmit({
            		beforeSend: function() {
            	    },
            	    uploadProgress: function(event, position, total, percentComplete) {
            	    },
            	    complete: function(xhr) {
            			if (typeof callback === "function")
            	            callback();

        	            window.location.replace("{{ route('pages') }}");
            	    },
            	    iframe: true,
            	    dataType:  'json',
            	    async: false
            	});
        	}
        	else
        		showConfirmDialog("Please provide a title");
        });
    });
</script>

@include('layouts.footer')