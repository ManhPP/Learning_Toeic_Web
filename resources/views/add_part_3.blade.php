@extends('layouts.master')
@section('title','add part 3')
@section("css")
<link rel="stylesheet" type="text/css" href="{{URL::asset("css/admin-them-part3.css")}}">
@endsection
@section('navbar')
@parent
@endsection

@section('content')


<!-- body -->
<div class="body row">
		<div class="row">
			<div class="col-12 time-detail">
				<span>Tiêu đề: </span> <input id="tittle">
			</div>
		</div>

		<!-- part 3 -->
		<div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
			<div class="header-content">
				<div>Practic part 3 (30 sentences)</div>
			</div>
			<div class="content">
				<div class="p1">
					<!-- audio -->
					<div class="audio">
						<span>Input audio here</span>
						<form id="form-upload-audio">
							<input id="up-audio" type="file" name="audio" accept="audio/*">
						</form>
					</div>
					<hr>
					
					<!-- intro img-->
					<div class="intro">
						<span>Input image intro here</span>
						<form class="form-upload-img">
							<input id="up-img" type="file" name="file-image" accept="image/*">
						</form>
					</div>
					<hr>
					<!-- list cau hoi -->
					<div class="list-cau">
						<!-- <c:forEach var="index" begin="0" end="29"> -->
                            @for($index=0; $index<=29 ;$index++)
							<!-- <c:if test="${index%3==0 }"> -->
                                @if($index%3==0)
								<div class="block" data-index="{{$index}}">
								<p class="ques refer-ques">Questions {{$index+1}}-{{$index+3}} refer to the following conversation.</p>
                            <!-- </c:if> -->
                            @endif
							<div class="ques" data-index="{{$index}}">
								<div>
									<span class="no-ques">Câu {{$index+1}}</span>
									<span class="ques-content"></span>
									<span><img class="ico-edit" data-index="{{$index}}" src="{{URL::asset("imgs/edit.png")}}"></span>
								</div>
								<div class="row">
									<label class="col-12 col-md-6"><input type="radio" name="choise{{$index}}" value="A"><span class="asws"> </span></label>
									<label class="col-12 col-md-6"><input type="radio" name="choise{{$index}}" value="B"><span class="asws"> </span></label>
									<label class="col-12 col-md-6"><input type="radio" name="choise{{$index}}" value="C"><span class="asws"> </span></label>
									<label class="col-12 col-md-6"><input type="radio" name="choise{{$index}}" value="D"><span class="asws"> </span></label>
								</div>
								<hr>
							</div>
							<!-- <c:if test="${index%3==2 }"> -->
                                @if($index%3==2)
								</div>
                            <!-- </c:if> -->
                                @endif
                        <!-- </c:forEach> -->
                        @endfor
						<div style="text-align: center;margin-top: 2em;">
							<input style="width: 5em;" type="button" value="Add" id="add-part">
						</div>
					</div>
				</div>
			</div>
		</div>

    </div>
    <!-- Open modal -->
	<button id="my-button" style="display: none;" data-toggle="modal"
		data-target="#myModal">Open modal</button>
		
	<!-- nhap noi dung cau -->
	<div class="modal fade" tabindex="-1" role="dialog"
		aria-labelledby="mySmallModalLabel" aria-hidden="true"
		id="model-input-page">
		<div class="modal-dialog" style="top: 5em">
			<div class="modal-content" id="modal-content-iques">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Nhập câu hỏi</h4>
				</div>
				<div class="modal-body">
					<div>
						<div id="label-cauhoi">Câu hỏi <span id="lb-index-ques"></span></div>
						<div><textarea class="input-ques-modal" cols="50""></textarea></div>
					</div>
					<div>
						<div class="label-da"><input class="radio-choise" type="radio" name="choise" value="A" checked="checked">Đáp án A:</div>
						<div><textarea class="input-ques-modal" cols="50""></textarea></div>
					</div>
					<div>
						<div class="label-da"><input class="radio-choise" type="radio" name="choise" value="B">Đáp án B:</div>
						<div><textarea class="input-ques-modal" cols="50""></textarea></div>
					</div>
					<div>
						<div class="label-da"><input class="radio-choise" type="radio" name="choise" value="C">Đáp án C:</div>
						<div><textarea class="input-ques-modal" cols="50""></textarea></div>
					</div>
					<div>
						<div class="label-da"><input class="radio-choise" type="radio" name="choise" value="D">Đáp án D:</div>
						<div><textarea class="input-ques-modal" cols="50""></textarea></div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" id="btn-input-yes" data-next="false">Ok</button>
					<button type="button" class="btn" id="btn-input-oan">Ok and next</button>
					<button type="button" class="btn btn-primary" id="btn-input-no">Cancel</button>
				</div>
			</div>
		</div>
	</div>

<!-- Open modal -->
<button id="my-button" style="display: none;" data-toggle="modal"
		data-target="#myModal">Open modal</button>
	<div style="display: none;">
		<div id="path-add">{{Route("conversationparagraphcontroller.createcppart3")}}</div>
		<div id="root-path">{{URL("")}}</div>
		<div id="id-user">${acc.id }</div>
	</div>
	
@endsection

@section('footer')
@parent
@endsection

@section('js')
<script type="text/javascript" src="{{ URL::asset("js/admin-them-part3.js") }}"></script>
@endsection