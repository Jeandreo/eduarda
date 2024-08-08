<?php
use App\Models\Catalog;
use App\Models\ChallengeCompleted;
use App\Models\ChallengeMonthly;
use App\Models\ChallenngeMonthly;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;

function findImage($pathAndFile, $default = 'user'){

    if(Storage::disk('public')->exists($pathAndFile)){
        $url = asset('storage/' . $pathAndFile);
    } else {
        if($default == 'no-photo'){
            $url = asset('/assets/media/images/no-photo.jpg');
        } elseif($default == 'beautiful') {
            $url = asset('/assets/media/images/image-beautiful.jpg');
        } else {
            $url = asset('/assets/media/avatars/blank.png');
        }
    }
    return $url;
}