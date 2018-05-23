<?php

namespace App\Http\Controllers;

use Auth;

use App\Bnetaccount;

use Illuminate\Support\Facades\Storage;

class BattlenetController extends Controller
{
    public function store() {
        
        $this->validate(request(), [
            'bnetaccount' => 'required'
        ]);

        $data = Bnetaccount::getbnetAcc(request('bnetaccount'));

        if(!empty($data)) 
        {

            $decode = json_decode($data, true);

            $ranks = array(
                'bronze' => '120px-Badge_1_Bronze.png',
                'silver' => '120px-Badge_2_Silver.png',
                'gold' => '120px-Badge_3_Gold.png',
                'platinum' => '120px-Badge_4_Platinum.png',
                'diamond' => '120px-Badge_5_Diamond.png',
                'master' => '120px-Badge_6_Master.png',
                'grandmaster' => '120px-Badge_7_Grandmaster.png',
                'top500' => '120px-Badge_8_Top_500.png'
            );

            $rating = $decode['eu']['stats']['competitive']['overall_stats']['comprank'];
            $tier = $ranks[$decode['eu']['stats']['competitive']['overall_stats']['tier']];
            $winrate = $decode['eu']['stats']['competitive']['overall_stats']['win_rate'];
            $avatar = $decode['eu']['stats']['competitive']['overall_stats']['avatar'];

            if(!empty($avatar)) {
                $picture = @file_get_contents($avatar);
                if(!empty($picture)) {
                    $filename = @array_pop(explode('/', $avatar));
                    $bla = Storage::put('public/avatar/'. $filename .'', $picture);
                }
            }

            $bnetadd = Bnetaccount::create([
                'bnetaccount' => request('bnetaccount'),
                'user_id' => auth()->id(),
                'rating' => $rating,
                'tier' => $tier,
                'winrate' => $winrate,
                'avatar' => "storage\avatar\\".$filename,
                'statscache' => $data
            ]);
            
            if($bla && $bnetadd) {
                session()->flash('message', 'Bnetaccount sucessfully added!');
            } else {
                session()->flash('message', 'Bnetaccount not added!');
            }
            
            return redirect('/games');

        } else 
        {

            session()->flash('message', 'Bnetaccount not added or API not avaiable!');

            return redirect('/games');
        }
        
    }

    public function refresh() 
    {   

        $data = Bnetaccount::getbnetAcc();

        if(!empty($data)) 
        {

            $decode = json_decode($data, true);

            $ranks = array(
                'bronze' => '120px-Badge_1_Bronze.png',
                'silver' => '120px-Badge_2_Silver.png',
                'gold' => '120px-Badge_3_Gold.png',
                'platinum' => '120px-Badge_4_Platinum.png',
                'diamond' => '120px-Badge_5_Diamond.png',
                'master' => '120px-Badge_6_Master.png',
                'grandmaster' => '120px-Badge_7_Grandmaster.png',
                'top500' => '120px-Badge_8_Top_500.png'
            );

            $rating = $decode['eu']['stats']['competitive']['overall_stats']['comprank'];
            $tier = $ranks[$decode['eu']['stats']['competitive']['overall_stats']['tier']];
            $winrate = $decode['eu']['stats']['competitive']['overall_stats']['win_rate'];
            $avatar = $decode['eu']['stats']['competitive']['overall_stats']['avatar'];
            


            if(!empty($avatar)) {
                $picture = @file_get_contents($avatar);
                if(!empty($picture)) {
                    $filename = @array_pop(explode('/', $avatar));
                    $bla = Storage::put('public/avatar/'. $filename .'', $picture);
                }
            }

            $bnetupdate = Bnetaccount::where('user_id', auth()->id())
            ->update([
            'rating' => $rating,
            'tier' => $tier,
            'winrate' => $winrate,
            'avatar' => "storage\avatar\\".$filename,
            'statscache' => $data]);


            if($bla) 
            {
                session()->flash('message', 'Statistics successfully updatet!');
            } else {
                session()->flash('message', 'Statistics successfully updatet, couldn´t update Avatar!');
            }
            

            return redirect('/games');

        } else 
        {
            session()->flash('message', 'Statistics not updatet API not avaiable!');

            return redirect('/games');
        }

    }
    
}
