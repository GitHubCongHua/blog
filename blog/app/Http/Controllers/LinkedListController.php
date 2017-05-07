<?php
/**
 * Created by PhpStorm.
 * User: zfy
 * Date: 2017/4/1
 * Time: 16:02
 */

namespace App\Http\controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LinkedListController extends Controller
{

    public function main()
    {
        return view('Linkedlist.MainView');
    }

    public function construct_view()
    {
        return view('Linkedlist.construct_view');
    }

    public function push_view()
    {
        return view('Linkedlist.push_view');
    }

    public  function update_view()
    {
        return view('Linkedlist.update_view');
    }

    public function insert_view()
    {
        return view('Linkedlist.insert_view');
    }

    public function delete_view()
    {
        return view('Linkedlist.delete_view');
    }

    public function pop_view()
    {
        return view('Linkedlist.pop_view');
    }

    public function construct(Request $request)
    {
        $lent=DB::table('linkedlist')->count();
        DB::table('linkedlist')
            ->delete();
        $list=$request->input('list');
        $element=explode(" ",$list);
        $lenth = count($element);
            for($i=0;$i<$lenth;$i++)
            {
                DB::table('linkedlist')
                    ->insert([
                        'list' => $element[$i], 'inde' => $i
                    ]);
            }

        $linkedlist=DB::table('linkedlist')->get();
        return view('Linkedlist.print_list',[
            'linkedlist'=>$linkedlist
        ]);
    }

    public function update(Request $request)
    {
//       DB::update('update linkedlist set list=? where id=? ' ,[$list,$id]);
     $element=$request->input('Element');
     $inde=$request->input('Inde');
     $lenth=DB::table('linkedlist')->count();
     if(is_null($inde)||is_null($element))
    {
        return view('Linkedlist.Empty Input');
    }
     if($inde<$lenth) {
         DB::table('linkedlist')
             ->where('inde', $inde)
             ->update(['list' => $element]);
         return view('Linkedlist.Succeed_view');
     }
     else if($inde==$lenth){
         DB::table('linkedlist')
             ->insert(
                 ['list'=>$element,'inde'=>$inde]
             );
         return view('Linkedlist.succeed_view');
     }
     else if($inde>$lenth){
         return view('Linkedlist.Array_bounds');
     }

    }

    public function insert(Request $request)
    {
        $element=$request->input('Element');
        $inde=$request->input('Inde');
        $lenth=DB::table('linkedlist')->count();
        if(!is_null($element)&&!is_null($inde)) {
            if ($inde < $lenth) {
                DB::table('linkedlist')
                    ->where('inde', '>=', $inde)
                    ->increment('inde', 1);
                DB::table('linkedlist')
                    ->insert([
                        'list' => $element, 'inde' => $inde
                    ]);
                return view('Linkedlist.Succeed_view');
            } else {
                return view('Linkedlist.Array_bounds');
            }
        }
        else
        {
                return view('Linkedlist.Empty Input');
        }

    }

    public function push(Request $request)
    {
//       $bool= DB::insert('insert into linkedlist(list ) VALUES (?)',
//        [$s]
//        );
//       var_dump($bool);
        $input=$request->input('Element');
        $lenth=DB::table('linkedlist')->count();
//        DB::insert('insert into linkedlist(list,inde) VALUES (?,?)',[$input,$lenth]);
//        DB::insert('insert into linkedlist(index) VALUES (?) WHERE list=$input)',[$lenth);

        if(is_null($input)) {
            return view('Linkedlist.Empty Input');
        }
        else
        {
            DB::table('linkedlist')->insert([
            'list'=>$input,'inde'=>$lenth
        ]);
            return view('Linkedlist.Succeed_view');
        }

    }

    public function print_list()
    {
//         $bool= DB::table('linkedlist')->get();
//         foreach ($bool as $bool) {
//             var_dump($bool->list);
//         }
      $linkedlist=DB::table('linkedlist')->get();
      return view('Linkedlist.print_list',[
          'linkedlist'=>$linkedlist
      ]);

    }

    public function pop()
    {
//        $bool=DB::select('select list from linkedlist order by id DESC LIMIT 1');
//        dd($bool);
        $lenth=DB::table('linkedlist')->count();
        if($lenth>0)
        {
            $list=DB::table('linkedlist')
                ->where('inde','=',$lenth-1)
                ->pluck('list');                     //获得具体字段的查询函数


                  DB::table('linkedlist')
                ->where('inde','=',$lenth-1)
                ->delete();

            return view('Linkedlist.pop_view',[
                'list' => $list
                ]);

        }
        else
        {
            echo "You can't pop an empty array";
        }

    }

    public function delete(Request $request)
    {
//        $bool=DB::delete('delete from linkedlist where id=?',[$id]);
//        var_dump($bool);
        $inde=$request->input('Inde');
        $lenth=DB::table('linkedlist')->count();
        if(is_null($inde))
        {
            return view('Linkedlist.Empty Input');
        }
        else
        {
            if ($inde < $lenth) {
                DB::table('linkedlist')
                    ->where('inde', $inde)
                    ->delete();
                DB::table('linkedlist')
                    ->where('inde', '>', $inde)
                    ->decrement('inde', 1);
                return view('Linkedlist.succeed_view');
            } else {
                return view('Linkedlist.Array_bounds');
            }
        }

    }
}