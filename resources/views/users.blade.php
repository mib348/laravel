@include('layouts.header')

<?php
    $strModule = basename($_SERVER['REQUEST_URI']);
?>
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Users</h3>
      <a class="pull-right btn btn-info" href="{{url('/users/new')}}">New</a>
    </div>
    <div class="box-body">
    	<div class="table-reponsive">
    		<table class="table table-vcenter">
    			<thead>
    				<tr>
    					<th style="width: 25%;">Name</th>
    					<th style="width: 25%;">Email</th>
    					<th>Type</th>
    					<th>Created</th>
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
		GetData();

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
					GetData();
				}
			});
		});
	});

	function GetData(){
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