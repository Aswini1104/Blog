@include('layouts/user/header')
@include('layouts/user/menu')

<section>
		<div class="gap gray-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row merged20" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">
								
								
									
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="loadMore">
									<div class="central-meta new-pst item">
										<div class="new-postbox">
											<figure>
                                                @if(Auth::user()->photo)
                                                    <img src="/profile/{{Auth::user()->photo}}" alt="">
                                                @else
                                                    <img src="/profile/unknown.png" alt="">
                                                    @endif
                                                
											</figure>
											<div class="newpst-input">
												<form action = "blogSubmitedit" method="POST" enctype="multipart/form-data">
                                                @csrf
													<textarea name = "blogDiscription" rows="2" placeholder="write something">{{$getBlog->discription}}</textarea>
													<div class="attachments">
														<ul> 
															<li>
																<i class="fa fa-image"></i>
																<label class="fileContainer">
																	<input name = "image" type="file" value="{{$getBlog->photo}}">
																	<input name = "id" type="hidden" value="{{$getBlog->id}}">

																</label>
															</li>
															
														</ul>
                                                       
													</div>
                                                    <br>
                                                    <div class="form-group">
													<select name = "category">
														<option value="{{$getBlog->category_id}}">{{$getBlog->name}}</option>
														  @foreach($getCategory as $getCategoryval)
                                                          <option value="{{$getCategoryval->id}}">{{$getCategoryval->name}}</option>
                                                          @endforeach
													</select>
												</div>
                                                        <button type="submit">Publish</button>
											</form>
											</div>
										</div>
									</div>
								</div>
							</div><!-- centerl meta -->
							
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>
    @include('layouts.user.footer')