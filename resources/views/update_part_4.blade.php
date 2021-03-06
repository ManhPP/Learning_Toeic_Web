@extends('layouts.master')
@section('title','update part 4')
@section("css")
<link rel="stylesheet" type="text/css" href="{{URL::asset("css/admin-update-part4.css")}}">
@endsection
@section('navbar')
@parent
@endsection

@section('content')


<!-- body -->
<div class="body row">
		<div class="row">
			<div class="col-12 time-detail">
				<span>Tiêu đề: </span> <input id="tittle" value="{{$partNghe->title}}">
			</div>
		</div>

		<!-- part 3 -->
		<div class="content-container col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
			<div class="header-content">
				<div>Practic part 4 (30 sentences)</div>
			</div>
			<div class="content">
				<div class="p1">
					<!-- audio -->
					<div class="audio">
						<span>Input audio here</span>
						<form id="form-upload-audio" data-path="{{$partNghe->audio}}">
							<input id="up-audio" type="file" name="audio" accept="audio/*">
						</form>
					</div>
					<hr>
					
					<!-- intro img-->
					<div class="intro">
						<span>Input image intro here</span>
						<form class="form-upload-img" data-path="{{$partNghe->intro}}">
							<input id="up-img" type="file" name="file-image" accept="image/*">
						</form>
					</div>
					<hr>
					<!-- list cau hoi -->
					<div class="list-cau">
						@php $index = 0; @endphp
						@foreach($partNghe->conversation_paragraph as $doanHoiThoai)
							@foreach($doanHoiThoai->conversationSentence as $cauHoiThoai)
									@if($index%3==0)
									<div class="block" data-index="{{$index}}" data-id="{{$doanHoiThoai->id}}">
									<p class="ques refer-ques">Questions {{$index+1}}-{{$index+3}} refer to the following conversation.</p>
									@endif
								<div class="ques" data-index="{{$index}}" data-id="{{$cauHoiThoai->id}}">
									<div>
										<div class="no-ques">Câu {{$index+1}}</div>
										<div class="ques-content">{{$cauHoiThoai->cauHoi}}</div>
										<span><img class="ico-edit" data-index="{{$index}}" src="{{URL::asset("/imgs/edit.png")}}"></span>
									</div>
									<?php $checkA = ""?>
									<?php $checkB = ""?>
									<?php $checkC = ""?>
									<?php $checkD = ""?>
									@if($cauHoiThoai->dADung == 'A')
										@php $checkA = "checked='checked'" @endphp
									@endif
									@if($cauHoiThoai->dADung == 'B')
										@php $checkB = "checked='checked'" @endphp
									@endif
									@if($cauHoiThoai->dADung == 'C')
										@php $checkC = "checked='checked'" @endphp
									@endif
									@if($cauHoiThoai->dADung == 'D')
										@php $checkD = "checked='checked'" @endphp
									@endif
									<div class="row">
										<label class="col-12 col-md-6"><input disabled="disabled" type="radio" name="choise{{$index }}" value="A" {{$checkA}}><span class="asws">{{$cauHoiThoai->dAA }}</span></label>
										<label class="col-12 col-md-6"><input disabled="disabled" type="radio" name="choise{{$index }}" value="B" {{$checkB}}><span class="asws">{{$cauHoiThoai->dAB }}</span></label>
										<label class="col-12 col-md-6"><input disabled="disabled" type="radio" name="choise{{$index }}" value="C" {{$checkC}}><span class="asws">{{$cauHoiThoai->dAC }}</span></label>
										<label class="col-12 col-md-6"><input disabled="disabled" type="radio" name="choise{{$index }}" value="D" {{$checkD}}><span class="asws">{{$cauHoiThoai->dAD }}</span></label>
									</div>
									<hr>
								</div>
									@if($index%3==2)
									</div>
									@endif
									@php $index++ @endphp
							@endforeach
						@endforeach
						<div style="text-align: center;margin-top: 2em;">
							<input style="width: 5em;" type="button" value="Update" id="add-part">
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
						<div><textarea class="input-ques-modal" cols="50"></textarea></div>
					</div>
					<div>
						<div class="label-da"><input class="radio-choise" type="radio" name="choise" value="A" checked="checked">Đáp án A:</div>
						<div><textarea class="input-ques-modal" cols="50"></textarea></div>
					</div>
					<div>
						<div class="label-da"><input class="radio-choise" type="radio" name="choise" value="B">Đáp án B:</div>
						<div><textarea class="input-ques-modal" cols="50"></textarea></div>
					</div>
					<div>
						<div class="label-da"><input class="radio-choise" type="radio" name="choise" value="C">Đáp án C:</div>
						<div><textarea class="input-ques-modal" cols="50"></textarea></div>
					</div>
					<div>
						<div class="label-da"><input class="radio-choise" type="radio" name="choise" value="D">Đáp án D:</div>
						<div><textarea class="input-ques-modal" cols="50"></textarea></div>
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
		<div id="path-update">{{Route("conversationparagraphcontroller.updatepart3")}}</div>
		<div id="root-path">{{URL("")}}</div>
		<div id="id-user">${acc.id }</div>
		<div id="id-pn">{{$partNghe->id}}</div>
	</div>
	
@endsection

@section('footer')
@parent
@endsection

@section('js')
<script type="text/javascript" src="{{ URL::asset("js/admin-update-part4.js") }}"></script>
@endsection