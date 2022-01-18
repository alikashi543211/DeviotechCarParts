	  @foreach($carTrim as $item)
	  <option value="{{$item->id_car_trim}}">
			  {{$item->name}}
	 </option>
	 @endforeach