<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected 
    $fillable = [
        'user_id',
        'name',
        'status',
        'start_date',
        'end_date',
        'description',
        'attendees_user',
        'attendees_lead',
        'food_package',
    ];
    public static $status   = [
        'Active','Inactive'
    ];
    public static $parent   = [
        '' => '--',
        'account' => 'Account',
        'lead' => 'Lead',
        'contact' => 'Contact',
        'opportunities' => 'Opportunities',
        'case' => 'Case',
    ];
    public static  $function = [
        'Breakfast',
        'Brunch',
        'Lunch',
        'Dinner',
        'Wedding'
    ];
    public static $breakfast = [
        'Premium Breakfast',
        'Classic Brunch',
        // 'Additional Options'
    ];
    public static $lunch = [
        'Hot Luncheon',
        'Cold Luncheon',
        'Barbecue',
        // 'Additional Options'

    ];
    public static $dinner = [
        'Adirondack Premium Dinner',
        'Emerald Dinner',
        'Elite Dinner'
    ];
    public static $wedding = [
        'Premium Wedding',
        'Elite Wedding',
        'Plated Wedding Package'        
    ];
   
    public function assign_user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function attendees_contacts()
    {
        return $this->hasOne('App\Models\Contact', 'id', 'attendees_contact');
    }
    public function attendees_users()
    {
        return $this->hasOne('App\Models\User', 'id', 'attendees_user');
    }

    public function attendees_leads()
    {
        return $this->hasOne('App\Models\Lead', 'id', 'attendees_lead');
    }

    public function getparent($type, $id)
    {
        if($type == 'account')
        {
            $parent = Account::find($id)->name;

        }
        elseif($type == 'lead')
        {
            $parent = Lead::find($id)->name;
        }
        elseif($type == 'contact')
        {
            $parent = Contact::find($id)->name;
        }
        elseif($type == 'opportunities')
        {
            $parent = Opportunities::find($id)->name;
        }
        elseif($type == 'case')
        {
            $parent = CommonCase::find($id)->name;
        }else{
            $parent= '';
        }

        return $parent;
    }
}
