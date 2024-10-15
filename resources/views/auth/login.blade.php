<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		.container {
			position: relative;
			display: flex;
			justify-content: center;
			justify-content: center;
			align-items: center;
			width: 100vw;
			height: 100vh;
			background-image: url('{{asset("images/image_1.jpg")}}');
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		.container::before{
			content: ' ';
			position: absolute;
			inset: 0;
			width: 100%;
			height: 100%;
			background: rgba(000, 000, 000, 0.5);
			z-index: 1;
		}
		.card {
			max-width: 260px;
			background: #ccc;
			z-index: 2;
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
		}
		.card-header{
			background: #777;
			color: #000;
			text-align: center;
			font-weight: bold;
			font-size: 20px;
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
		}
		.card-header img{
			width: 100px;
		}
		.card-body{
			padding: 10px;
			display: flex;
			flex-direction: column;
			gap: 10px;
		}
		a {
			position: relative;
			font-size: 16px;
			line-height: 20px;
			padding: 9px 21px 11px;
			background-color: #54a9eb;
			text-overflow: ellipsis;
			overflow: hidden;
			border-radius: 20px;
			text-decoration: none;
			font-family: 'Roboto', sans-serif;
			white-space: nowrap;
			color: #fff;
		}
		a > span{
			margin-left: 20px;
		}
		.btn-google{
			background: #EEE;
			color: #777;
		}
		.btn-facebook {
			background: #3b5998;
		}
		.btn-facebook, .btn-google{
			position: relative;
		}
		.btn-facebook:after, .btn-google:after{
			position: absolute;
			inset: 5px;
			content: ' ';
			height: 30px;
			width: 30px;
			background-size: 30px;
    		background-repeat: no-repeat;
		}
		.btn-facebook:after {
			background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAAsTAAALEwEAmpwYAAABfElEQVR4nO3avWoUURQH8AOKQuzSRgRJVOzsTWORQvARbFLkCVJYWYSA5gVEQRAEG/UZ8gQWgp3YWQSbFGnzwU+GWEiIH3czzM69c35w2pk9/zl39s7sRqSUUkoppTQ3uIz7eIxNPPlLPYhW4C7eYt//O8Zy1AzX8ApHZrMWtcISPs3YeN0BYBHfLth8nQHgEnZ7aL7aANZ7ar6+AHAV36ccwKMem68ygNdTD+Bzj82f4HbUBD9maPTrr83Szm/1HA+jNk6vWokX3fNBtEKZ7tviSrREmY/RGmXeRI2wgff4cE6V+HLmxne2no3unQDuGFb3GL0UY+H0bc7QbsaEA9iLMTF8AO9i4gFsxMQDuBUTDmAvxsawAYxr/c8hgHGt/w6u43CA5rtz3Igxwiq2/7B9LfXynGN0x16NGql5l9eHDKBcTkC0RE5AsZyAaImcgGI5AdESOQHFcgKiJXIClPwz7AAL0RKs4Ok/fvLqagv35v15U0oppZRSTMBP60qJ8g6TwvwAAAAASUVORK5CYII=");
		}
		.btn-google:after{
			background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEkUlEQVR4nO2Zb0wbZRzHn3taesUtRpOJYbo/DoQM5c/GMgryzxkYxbGBiQsbNBCEFGaIY8zCCuaUMSiQAQMGQWAgcSY2GeuNuzpc8NqNvRoCItE3841Dthj3ToNzbX+mVRBI197Zo2VJv8n3XZ+nn89dn6dPrwj5448/HgcoJIWqgGIoxywU4HuQTfwJSsIKBxBAKgJIQzbIJhZBhX+BE/g6VAUU2ccgXwc0UgWU4tvwNmGBJASCqiQsoMa3QRsQ433wOlk4qPEsvCkQ2llTEUAxnoEaFOIdeA3RCumEzWPwtT2IrHCK0K0f+HkUCMX4B9HBk9b0PTwNFJKJC9+NngcVfrDu8En/toJoFw9+EMnhOPGr1+DLCE40eIeAGn/vPXgsMvyHRIfgrbEMT0IlroUmaQpQaAtQKAjOSN6C05hy7Db21zgbW4pN4sI3kyGQQVh5g5+W9PJZfEChZ+ADydAqkVKR4R1vVIHv8IIvwPNwDr0oeP4aFAJ5+P76wJvl22CcfAQaCUCyC/gSPAV6JEEbLWAmdWAmwdHeAIB0wvmV35DweiQBs2x+WcDeURmACv8Hn0lYoAK9hDZiwCSPXwW/VI4E0En/ObuclPSjjRowybROBZY6FPAAyhGJNmrATF5xKWCSdQiZL1gzC2I0XDthO9rUd9e9gImccynAkRm+EAjWzMIbddcW+Qg8dCMQ6iuB3TW3rHwEHrkWQJt9JbCjehKeaoHtVd+C5x+hm7IwXwns1t60Pd2L+JNRHovYTI642UY7fSVwRDc8z0NAduZJ8A+5Z6Geif/jvF4RiEROy3D+puiPvrG4Eii/0DjqXoALVDiDnx0PBhWthENXs6HDGHtJbIGTnfX97u6Arq/iuHsBQBjMsntL4DYzCfRYOGQbDjvg7c2jlZaL11/bJhZ8W496Z2SNyeoK/vVas4XiKH5P88BENtrhfzdthrNMwjL4ylaPJi9wXIrHjwcpjpIeafxswd3VL2lrm+A9KXCBL98df+GvEjrdKfxSP2YTZjyRoDhKmt/SM+d2/6+egsbuylhBkzcwihlX8CvvRP/X4VuFwvfeiNhe1lX3E5/d51hz75zQ+RE9FvZKPq208pHIp5WWzq/2DlCDKXJ38w6PRW1qZ/b15RmU1pyRHDja2uH2FEp9ekrQl+dyutmY1iweAitFGljFdJdxL6VnIw5cGdsVdJkL2zJgjEq8aNxTV8ckTNpfs3JM1kgOFPZQsLXqO6cC77c3dSNPomPjpvkKeNKiwXLYWX1nFfy7TQM/Ik+j10fINHTqfW9IFH5RCJG1Jgd8ev2Xv53o6hJ0cHxiOG7HczVM4oI3JI7pc0HVemGeGq4MEgV+hYT8LBM/K2RN/J+eYxXTRmPo+v3m7jNGNecaMq2iX3lDprWXjWlG3sgwvSe0gY2beseQ5TF4ztXDjqt++caru5C3MzQWGdvM7L9VZDj4WCh4AZ3xuJGJm/icifb+n3xrowck6WeiC1uN+0a1TOLPajptUWVQWu13yH4IzDVk2tSGtMWqa8nzLex+ts8YU2Afg/zxxx/kaf4GzSVnCicBYF0AAAAASUVORK5CYII=");
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-header"><img src="{{asset('images/tele_tour.png')}}" /></div>
			<div class="card-body">
			{!! Socialite::driver('telegram')->getButton() !!}
			<a class="btn-google" href="{{route('redirect', ['driver'=>'google'])}}"><span>Log in with Google</span></a>
			{{-- <a class="btn-facebook" href="{{route('redirect', ['driver'=>'facebook'])}}"><span>Log in with Facebook</span></a> --}}
			</div>
		</div>
	</div>
</body>
</html>