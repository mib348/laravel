@include('layouts.header')

<?php
    $strModule = basename($_SERVER['REQUEST_URI']);
?>
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Menu Builder</h3>
    </div>
    <div class="box-body">
    	<b>Add Menu</b>
    	<form id="menu_form">
    		<input type="hidden" id="nId" name="nId" />
        	<div class="row">
        		<div class="col-xs-3">
        			Name
        			<input type="text" id="strName" name="strName" class="form-control" required="required" />
        		</div>
        		<div class="col-xs-3">
        			Link
        			<input type="url" id="strLink" name="strLink" class="form-control"  />
        		</div>
        		<div class="col-xs-3">
        			<br>
        			<a class="btn btn-success save_btn">Save</a>
        		</div>
        	</div>
    	</form>
    	<br>
    	<div class="table-reponsive">
    		<table class="table table-vcenter">
    			<thead>
    				<tr>
    					<th>Name</th>
    					<th>Link</th>
    					<th>Action</th>
    				</tr>
    			</thead>
    			<tbody id="menu_tbody"></tbody>
    		</table>
    	</div>
    </div>
  </div>
  <!-- /.box -->
  
<script type="text/javascript">
	$(function(){
		GetMenu();

		$(document).on("click", ".save_btn", function(){
			$(".save_btns").attr("disabled", true);
			
			if($("#strName").val() != ""){
				$.ajax({
					url:"{{ url('/') . '/' . $strModule }}/new",
					headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
					type:"post",
					cache:false,
					data:$("#menu_form").serialize(),
					dataType:"json",
					success:function(data){
						GetMenu();
					}
				});
			}
			else
				showConfirmDialog("Please provide a menu name");
		});

		$(document).on("click", ".edit_btn", function(){
			$.ajax({
				url:"{{ url('/') . '/' . $strModule }}/edit",
				headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
				type:"post",
				cache:false,
				data:"nId=" + $(this).parent().parent().attr("id"),
				dataType:"json",
				success:function(data){
					$("#nId").val(data['id']);
					$("#strName").val(data['name']);
					$("#strLink").val(data['link']);
				}
			});
		});

		$(document).on("click", ".delete_btn", function(){
			$.ajax({
				url:"{{ url('/') . '/' . $strModule }}/delete",
				headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
				type:"post",
				cache:false,
				data:"nId=" + $(this).parent().parent().attr("id"),
				dataType:"json",
				success:function(data){
					GetMenu();
				}
			});
		});
	});

	function GetMenu(){
		$.ajax({
			url:"{{ url('/') . '/' . $strModule }}",
			headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
			type:"post",
			cache:false,
			dataType:"html",
			success:function(data){
				if(data != null){
					$("#menu_tbody").html(data);
				}
				else{
					$("#menu_tbody").html("");
				}

				$("form select,input,textarea").val("");
				$("form input").attr("checked", false);
				$(".save_btns").attr("disabled", false);
			}
		});
	}
</script>
    

@include('layouts.footer')