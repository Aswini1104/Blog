@include('layouts.user.header')
@include('layouts.user.menu')

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
                                                    <img src="profile/{{Auth::user()->photo}}" alt="">
                                                @else
                                                    <img src="profile/unknown.png" alt="">
                                                    @endif
                                                
											</figure>
											<div class="newpst-input">
												<form action = "blogSubmit" method="post" enctype="multipart/form-data">
                                                @csrf
													<textarea name = "blogDiscription" rows="2" placeholder="write something"></textarea>
													<div class="attachments">
														<ul> 
															<li>
																<i class="fa fa-image"></i>
																<label class="fileContainer">
																	<input name = "image" type="file">
																</label>
															</li>
															
														</ul>
                                                       
													</div>
                                                    <br>
                                                    <div class="form-group">
													<select name = "category">
														<option value="">Select Category</option>
														  @foreach($getCategory as $getCategoryval)
                                                          <option value="{{$getCategoryval->id}}">{{$getCategoryval->name}}</option>
                                                          @endforeach
													</select>
												</div>
                                                        <button type="submit">Publish</button>
											</form>
											</div>
										</div>
									</div><!-- add post new box -->
                                    @foreach($getBlog as $getBlogval)
									<div class="central-meta item">
										<div class="user-post">
											<div class="friend-info">
                                            <figure>
                                                @if(Auth::user()->photo)
                                                    <img src="profile/{{Auth::user()->photo}}" alt="">
                                                @else
                                                    <img src="profile/unknown.png" alt="">
                                                    @endif
                                                
											</figure>
												<div class="friend-name">
													<ins>{{Auth::user()->name}}</ins> 
													<span>published: {{$getBlogval->created_at->format('d M Y')}} category : {{$getBlogval->name}}</span>@if($getBlogval->created_at != $getBlogval->updated_at) <span> Edited </span> @endif
                                                    <div class="more">
														<div class="more-post-optns"><i class="ti-more-alt"></i>
															<ul>
																<a href="edit/{{$getBlogval->id}}"><li><i class="fa fa-pencil-square-o"></i>edit blog</li></a>
																<a href="delect/{{$getBlogval->id}}"><li><i class="fa fa-share-square-o"></i>Delect</li></a>
																
															</ul>
														</div>
													</div>
                                                </div>
												<div class="description">
														
														<p>
															
                                                   {{$getBlogval->discription}}
                                                </p>
													</div>
                                                    @if($getBlogval->photo)
                                                    <div class="post-meta">
													<img src="blog/{{$getBlogval->photo}}" alt="">
                                                    </div>
                                                    @endif
                                                   
                                                   
														
                                                    
											</div>
										</div>
									</div>
                                    @endforeach
									
								</div>
							</div><!-- centerl meta -->
							
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>
    @include('layouts.user.footer')