<div class="details-review">
                            <div class="details-title">
                                <h3 class="title">reviews</h3>
                            </div>

                            <div class="consumer-reviews">    
                                <div class="point-rating">
                                    <div class="rating-score">
                                        <h5 class="score-title">Average Rating</h5>
                                        <span class="score-point">{{ $average_star }}</span>
                                        <div class="score-star">
                                            <ul class="star">
                                                @for($i=1;$i<=5;$i++)
                                                    <li class="@if($i<=$average_star) rating-on @endif"><i class="ion-android-star"></i></li>
                                                @endfor
                                                <li><i class="ion-android-star"></i></li>
                                            </ul>
                                            <span>({{ $total_reviews }} Reviews)</span>
                                        </div>
                                    </div>
    
                                    <div class="rating-progress">
                                        <div class="single-progress">
                                            <div class="progress-star">
                                                <span>5 Star</span>
                                            </div>
                                            <div class="progress-line">
                                                <div class="line-bar" style="width: {{ $five_star_percent  }}%;"></div>
                                            </div>
                                            <div class="progress-percent">
                                                <span>{{ $five_star_percent  }}%</span>
                                            </div>
                                        </div>
                                        <div class="single-progress">
                                            <div class="progress-star">
                                                <span>4 Star</span>
                                            </div>
                                            <div class="progress-line">
                                                <div class="line-bar" style="width: {{ $four_star_percent  }}%;"></div>
                                            </div>
                                            <div class="progress-percent">
                                                <span>{{ $four_star_percent  }}%</span>
                                            </div>
                                        </div>
                                        <div class="single-progress">
                                            <div class="progress-star">
                                                <span>3 Star</span>
                                            </div>
                                            <div class="progress-line">
                                                <div class="line-bar" style="width: {{ $three_star_percent  }}%;"></div>
                                            </div>
                                            <div class="progress-percent">
                                                <span>{{ $three_star_percent  }}%</span>
                                            </div>
                                        </div>
                                        <div class="single-progress">
                                            <div class="progress-star">
                                                <span>2 Star</span>
                                            </div>
                                            <div class="progress-line">
                                                <div class="line-bar" style="width: {{ $two_star_percent  }}%;"></div>
                                            </div>
                                            <div class="progress-percent">
                                                <span>{{ $two_star_percent  }}%</span>
                                            </div>
                                        </div>
                                        <div class="single-progress">
                                            <div class="progress-star">
                                                <span>1 Star</span>
                                            </div>
                                            <div class="progress-line">
                                                <div class="line-bar" style="width: {{ $one_star_percent  }}%;"></div>
                                            </div>
                                            <div class="progress-percent">
                                                <span>{{ $one_star_percent  }}%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="reviews-comment">
                                    <ul class="reviews-comments-items">
                                        @foreach($review_list as $review)
                                            <li>
                                                <div class="single-reviews-comment">
                                                    <div class="comment-author">
                                                        <img src="{{asset('theme')}}/assets/images/author-1.jpg" alt="">
                                                    </div>
                                                    <div class="comment-content">
                                                        <div class="rating-name">
                                                            <ul class="author-rating">
                                                                @for($i=1;$i<=5;$i++)
                                                                    <li class="@if($i<=$review->stars)rating-on @endif"><i class="ion-android-star"></i></li>
                                                                @endfor
                                                            </ul>
                                                            <div class="author-name">
                                                                <h4 class="name">{{$review->subject}}</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="meta">
                                                            <li>by <a href="javascript:void(0);">{{$review->name}}</a></li>
                                                            <li>{{ $review->created_at->diffForHumans() }}</li>
                                                        </ul>
                                                        <p>{{$review->review}}</p>
                                                        <!-- <a href="#" class="replay">Replay</a> -->
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
    
                                    <div class="more-reviews">
                                        @if($total_reviews > 4 && !isset(request()->reviews))
                                            <a href="{{ request()->url }}?reviews=all" class="more">see more reviews ({{ $total_reviews-4 }}) <i class="ion-ios-arrow-down"></i></a>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="reviews-form">
                                    <form class="review_submission_form" action="{{ route('review.save') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="stars" class="star_input" value="">
                                        <input type="hidden" name="user_id" value="{{ $seller->user_id }}">
                                        <h4 class="form-title">Submit your review</h4>
    
                                        <div class="your-rating">
                                            <p>Your rating of this product:</p>
                                            <ul id='stars'>
                                                <li class='star' title='Poor' data-value='1'>
                                                    <i class="ion-android-star"></i>
                                                </li>
                                                <li class='star' title='Fair' data-value='2'>
                                                    <i class="ion-android-star"></i>
                                                </li>
                                                <li class='star' title='Good' data-value='3'>
                                                    <i class="ion-android-star"></i>
                                                </li>
                                                <li class='star' title='Excellent' data-value='4'>
                                                    <i class="ion-android-star"></i>
                                                </li>
                                                <li class='star' title='WOW!!!' data-value='5'>
                                                    <i class="ion-android-star"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        @error('stars')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror

                                        <div class="form-input-items">
                                            <div class="row gx-4">
                                                <div class="col-md-4">
                                                    <div class="single-input">
                                                        <input type="text" name="name" placeholder="Full Name" required>
                                                        @error('name')
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="single-input">
                                                        <input type="email" name="email" placeholder="Email Address" required>
                                                        @error('email')
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="single-input">
                                                        <input type="text" name="subject" placeholder="Subject" required>
                                                        @error('subject')
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <textarea name="review" placeholder="Write your review here..."></textarea required>
                                                        @error('review')
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <button class="main-btn">Submit Review</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>