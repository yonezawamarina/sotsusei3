





@foreach ($categories as $category)
    <a href="{{ route('recipes.show',['id'=>$category->id])}}">{{ $category->name }}</a></br>
@endforeach

 