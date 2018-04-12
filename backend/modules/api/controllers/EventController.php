<?php

namespace backend\modules\api\controllers;
use backend\modules\api\models\Event;

class EventController extends \yii\web\Controller
{   public $enableCsrfValidation = false;
    public function actionIndex()
    {   
        //si c'est un post 
        if(\Yii::$app->request->post())
        {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
         $event = new Event();
     $event->scenario = Event::SCENARIO_CREATE;
     $event->attributes= \Yii::$app->request->post();
     
     if($event->validate()){
         $event->save();
         return array('status' => TRUE,'data' => 'event created successfully');
     }else{
         return array('status' => FALSE, 'data' => $event->getErrors());
     }
     
            
        }else{
            
            //si on cherche les events
                 \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
     $event = Event::find()->all();
     
     if(count($event)>0){
         return array('status' =>TRUE,'data'=>$event);
         
     }else{
         return array ('status' =>FALSE,'data' => 'No events found');
     }
        
        }
   
        
     
    
     
    
     
        return $this->render('index');
    }
public function actionCreateEvent(){
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
     $event = new Event();
     $event->scenario = Event::SCENARIO_CREATE;
     $event->attributes= \Yii::$app->request->post();
     
     if($event->validate()){
         $event->save();
         return array('status' => TRUE,'data' => 'event created successfully');
     }else{
         return array('status' => FALSE, 'data' => $event->getErrors());
     }
}

public function  actionListEvent(){
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
     $event = Event::find()->all();
     
     if(count($event)>0){
         return array('status' =>TRUE,'data'=>$event);
         
     }else{
         return array ('status' =>FALSE,'data' => 'No events found');
     }
}


public function  actionDashboard(){
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
     $event = Event::find()->all();
     
     
     
     
     if(count($event)>0){
         return array('status' =>TRUE,'data'=>$event);
         
     }else{
         return array ('status' =>FALSE,'data' => 'No events found');
     }
}
}
