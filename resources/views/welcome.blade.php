@extends('layouts.app')

@section('content')

<ul id="slide-out" class="side-nav">
<li>
    <div class="userView">
      <img class="background" src="http://i.telegraph.co.uk/multimedia/archive/01793/ginger-beer_1793863b.jpg">
      <a href="#!user"><img class="circle" src="http://www.wheretotonight.com/melbourne/images/empty_profile.png"></a>
      <a href="#!name"><span class="white-text name">John Doe</span></a>
      <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div>
</li>
<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
<li><a href="#!">Second Link</a></li>
<li><div class="divider"></div></li>
<li><a class="subheader">Subheader</a></li>
<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
</ul>
<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>

@endsection
