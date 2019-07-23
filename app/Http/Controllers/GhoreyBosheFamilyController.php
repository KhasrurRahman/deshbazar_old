<?php

namespace App\Http\Controllers;

use App\FamilyMember;
use Illuminate\Http\Request;
use Image;

class GhoreyBosheFamilyController extends Controller
{
    public function index(){
        return view('admin.family.add-family');
    }
    public function saveFamilyMember(Request $request){
        $memberImage = $request->file('member_image');
        $imageName = $memberImage->getClientOriginalName();
        $directory = 'member-images/';
        $imageUrl = $directory.$imageName;
        $image = Image::make($memberImage)->resize(150,150);
        $image->save($imageUrl);

        $familyMember = new FamilyMember();
        $familyMember->member_name = $request->member_name;
        $familyMember->quote = $request->quote;
        $familyMember->member_image = $imageUrl;
        $familyMember->save();

        return redirect('/add-family')->with('message','Family Member added successfullly.');
    }
    public function manageFamily(){
        $members = FamilyMember::all();
        return view('admin.family.manage-family',['members' => $members]);
    }
    public function editFamilyMember($id){
        $member = FamilyMember::find($id);
        return view('admin.family.edit-member',['member'=>$member]);
    }
    public function updateFamilyMember(Request $request){
        $memberImage = $request->file('member_image');
        $member = FamilyMember::find($request->member_id);
        if($memberImage){
            unlink($member->member_image);
            $imageName = $memberImage->getClientOriginalName();
            $directory = 'member-images/';
            $imageUrl = $directory.$imageName;
            $image = Image::make($memberImage)->resize(150,150);
            $image->save($imageUrl);

            $member->member_image = $imageUrl;
        }
        $member->member_name = $request->member_name;
        $member->quote = $request->quote;
        $member->save();
        return redirect('/manage-family')->with('message','Member Info Updated');
    }
    public function deleteFamilyMember($id){
        $member = FamilyMember::find($id);
        $member->delete();

        return redirect('/manage-family')->with('message','Member Deleted');
    }

}
