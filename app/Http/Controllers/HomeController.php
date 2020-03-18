<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;


class HomeController extends Controller
{

	public function index()
	{
		return view('home');
	}

	public function search(Request $request)
	{
		$sort_by 	= Input::get('sort_by');
		$page 		= Input::get('page');
		$daterange 	= Input::get('daterange');
		if($daterange != ""){
			$daterange  = explode(" - ", $daterange);
			$startDate  = date("Y-m-d", strtotime($daterange[0]));
			$endDate    = date("Y-m-d", strtotime($daterange[1]));
			$addParam   = "&page=".$page."&sort_by=".$sort_by."&primary_release_date.gte=".$startDate."&primary_release_date.lte=".$endDate;
		}else{
			$addParam   = "&page=".$page."&sort_by=".$sort_by;
		}
		$client = new Client();
		$get_movies		 = $client->get('https://api.themoviedb.org/3/discover/movie?api_key=1b869b3ccf57d089047ded4b1de007b8'.$addParam);
		$response_movies = $get_movies->getBody()->getContents();
		$obj_movies 	 = json_decode($response_movies);

		$get_genre	     = $client->get('https://api.themoviedb.org/3/genre/movie/list?api_key=1b869b3ccf57d089047ded4b1de007b8');
		$response_genre  = $get_genre->getBody()->getContents();
		$obj_genre 	 	 = json_decode($response_genre);
		$genre_list		 = array();
		if(count($obj_genre) > 0){
			foreach ($obj_genre as $keyResult => $valResult) {
				foreach ($valResult as $keyGenre => $valGenre) {
					$genre_list[$valGenre->id] = $valGenre->name;
				}
			}
		}
		$html = "";
		if(count($obj_movies) > 0){
			if($obj_movies->total_results > 0){
				foreach ($obj_movies->results as $key => $value) {
					$listGenre = array();
					if(count($value->genre_ids) > 0){
						foreach ($value->genre_ids as $genreId) {
							$listGenre[] = $genre_list[$genreId];
						}
					}

					$overview = $value->overview;
					if(strlen($value->overview) > 200){
						$overview = substr($value->overview,0,200).'.....';
					}
					$html .= '<div class="item poster card">';
					$html .= '<div class="image_content">';
					$html .= '<a id="movie_'.$value->id.'" class="result" href="'.url('detail').'/'.$value->id.'" title="'.$value->title.'" alt="'.$value->title.'">
					<img class="poster fade lazyautosizes lazyloaded" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/'.$value->poster_path.'">
					</a>';
					$html .= '</div>
					<div class="info">
					<div class="wrapper">
					<div class="flex">
					<a id="movie_299536" class="title result" href="'.url('detail').'/'.$value->id.'" title="'.$value->title.'" alt="'.$value->title.'">'.$value->title.'</a>
					<span>Popularity Rank : '.$value->popularity.'</span>
					</div>
					</div>
					<p class="overview">'.$overview.'</p>
					<br>
					<p class="genre" style="font-size: 13px;">Genre : '.implode(",", $listGenre).'</p>
					<p class="view_more"><a id="movie_299536" class="result" href="'.url('detail').'/'.$value->id.'" title="Avengers: Infinity War" alt="'.$value->title.'">More Info</a></p>
					</div>
					</div>';
				}
			}
		}
		return $html;
	}


	public function detail(Request $request){
		$movie_id = $request->route('movie_id');
		$client = new Client();
		$get_movies		 = $client->get('https://api.themoviedb.org/3/movie/'.$movie_id.'}?api_key=1b869b3ccf57d089047ded4b1de007b8');
		$response_movies = $get_movies->getBody()->getContents();
		$obj_movies 	 = json_decode($response_movies);
		$listGenre = array();
		foreach ($obj_movies->genres as $key => $value) {
			$listGenre[] = $value->name;
		}
		$genre = implode(",", $listGenre);

		$listLanguages= array();
		foreach ($obj_movies->spoken_languages as $key => $value) {
			$listLanguages[] = $value->name;
		}
		$languages = implode(",", $listLanguages);
		$runtime  = $this->durationConvert($obj_movies->runtime);
		return view('detail',compact('obj_movies','genre','languages','runtime'));
	}

	private function durationConvert($time)
	{
		if ($time < 1) {
			return;
		}
		$hours = floor($time / 60)." Hours";
		$minutes = ($time % 60)." Minutes";

		return $hours." ".$minutes;
	}

}