<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index()
    {
        $url_data = [
            array(
                'title' => 'Nirvana',
                'url' => 'nirvana.com'
            ),
            array(
                'title' => 'Aria',
                'url' => 'aria.com'
            )
        ];

        return view('start', ['url_data' => $url_data]);
    }

    /**
     * @return array
     */
    public function getJson()
    {
        return [
            array(
                'title' => 'Metallica',
                'url' => 'mt.com'
            ),
            array(
                'title' => 'AcDc',
                'url' => 'acdc.com'
            )
        ];
    }

    /**
     * @return array
     */
    public function chartData()
    {
        return [
            'labels' => ['апрель', 'май', 'июнь', 'июль', 'август'],
            'datasets' => array([
                'label' => 'Продажи',
                'backgroundColor' => ['#g26202', '#f87202', '#876543', '#fff777', '#000777'],
                'data' => [10400, 52000, 23400, 239000, 100003]
            ])
        ];
    }

    /**
     * @return array
     */
    public function chartRandom()
    {
        return [
            'labels' => ['апрель', 'май', 'июнь', 'июль', 'август'],
            'datasets' => array(
                [
                    'label' => 'Золото',
                    'backgroundColor' => '#16ab39',
                    'data' => [rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000)]
                ],
                [
                    'label' => 'Серебро',
                    'backgroundColor' => '#b5cc18',
                    'data' => [rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000)]
                ]
            )
        ];
    }

    /**
     * @return array
     */
    public function newEvent(Request $request)
    {
        $result = [
            'labels' => ['апрель', 'май', 'июнь', 'июль', 'август'],
            'datasets' => array([
                'label' => 'Продажи',
                'backgroundColor' => ['#g26202', '#f87202', '#876543', '#fff777', '#000777'],
                'data' => [10400, 52000, 23400, 239000, 100003]
            ])
        ];

        if ($request->has('label')) {
            $result['labels'][] = $request->input('label');
            $result['datasets'][0]['data'][] = (integer)$request->input('sale');
        }

        if ($request->has('realtime')) {
            if (filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)) {
                event(new \App\Events\NewEvent($result));
            }
        }

        return $result;
    }

    /**
     * @param Request $request
     */
    public function sendMessage(Request $request)
    {
        event(new \App\Events\NewMessage($request->input('message')));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function sendPrivateMessage(Request $request)
    {
        event(new \App\Events\PrivateMessage($request->all()));

        return $request->all();
    }
}
