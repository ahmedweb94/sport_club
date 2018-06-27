<!DOCTYPE html>
<html>
<head>
  <title><?php echo $result['0']->value;?> | <?php echo $title_page;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  
  <link href="<?php echo base_url();?>assets/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link href="<?php echo base_url();?>assets/layout/styles/style.css" rel="stylesheet" type="text/css" media="all">
  <script type="text/javascript">
    jssor_1_slider_init = function() {

      var jssor_1_SlideshowTransitions = [
      {$Duration:800,$Zoom:11,$Rotate:-0.5,$Easing:{$Rotate:$Jease$.$InSine,$Zoom:$Jease$.$Swing},$Opacity:2,$Brother:{$Duration:800,$Zoom:1,$Rotate:0.5,$Easing:{$Rotate:$Jease$.$InSine,$Zoom:$Jease$.$Swing},$Opacity:2,$Shift:200}},
      {$Duration:800,$Zoom:11,$Rotate:1,$Easing:{$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InQuad,$Zoom:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:1},$ZIndex:-10,$Brother:{$Duration:800,$Zoom:11,$Rotate:-1,$Easing:{$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InQuad,$Zoom:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:1},$ZIndex:-10,$Shift:400}},
      {$Duration:800,$Zoom:1,$Rotate:0.5,$Easing:{$Rotate:$Jease$.$InSine,$Zoom:$Jease$.$Swing},$Opacity:2,$Brother:{$Duration:800,$Zoom:11,$Rotate:-0.5,$Easing:{$Rotate:$Jease$.$InSine,$Zoom:$Jease$.$Swing},$Opacity:2,$Shift:200}},
      {$Duration:1000,x:1,$Rows:2,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2,$Brother:{$Duration:1000,x:-1,$Rows:2,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InOutQuart,$Opacity:$Jease$.$Linear},$Opacity:2}},
      {$Duration:800,$Zoom:11,$Easing:{$Zoom:$Jease$.$InOutExpo},$Opacity:2,$Brother:{$Duration:600,$Zoom:1.5,$Easing:{$Zoom:$Jease$.$InOutExpo},$Opacity:2,$Shift:-100}},
      {$Duration:800,$Zoom:1.9,$Easing:{$Zoom:$Jease$.$InOutExpo},$Opacity:2,$Brother:{$Duration:600,$Zoom:11,$Easing:{$Zoom:$Jease$.$InOutExpo},$Opacity:2,$Shift:-100}},
      {$Duration:800,$Zoom:11,$Easing:{$Zoom:$Jease$.$InOutExpo},$Opacity:2,$Brother:{$Duration:600,$Zoom:11,$Easing:{$Zoom:$Jease$.$InOutExpo},$Opacity:2,$Shift:-100}},
      {$Duration:1000,x:-0.6,y:1,$Zoom:11,$Rotate:0.1,$During:{$Left:[0.6,0.4],$Top:[0.6,0.4],$Rotate:[0.6,0.4],$Zoom:[0.6,0.4]},$Easing:{$Left:$Jease$.$InSine,$Top:$Jease$.$InSine,$Rotate:$Jease$.$InSine,$Zoom:$Jease$.$InSine},$Opacity:2,$Brother:{$Duration:600,$Zoom:1,$Rotate:-0.5,$Easing:{$Rotate:$Jease$.$InCubic,$Zoom:$Jease$.$InSine},$Opacity:2}}
      ];

      var jssor_1_SlideoTransitions = [
      [{b:10600,d:300,sX:-0.4,sY:-0.4,e:{sX:16,sY:16}},{b:11600,d:300,o:-0.6,sX:0.48,sY:0.48,e:{sX:5,sY:5}},{b:11900,d:2000,o:-0.2,sX:-0.08,sY:-0.08,e:{sX:24,sY:24}}],
      [{b:-1,d:1,o:-1},{b:8500,d:500,o:1}],
      [{b:0,d:2000,x:980,e:{x:16}},{b:2000,d:6000,x:1960,o:-1,e:{x:5}}],
      [{b:1000,d:2000,x:629,e:{x:7}},{b:3500,d:1000,x:110,o:-1,r:-180,sX:9,sY:9,e:{x:2,o:2,r:2,sX:2,sY:2}}],
      [{b:-1,d:1,o:-1,r:180,sX:9,sY:9},{b:4500,d:1000,o:1,r:-180,sX:-9,sY:-9,e:{o:3,r:3,sX:3,sY:3}},{b:7000,d:1500,x:266,y:-150,r:-360,sX:-0.9,sY:-0.9,e:{x:16,y:16,sX:16,sY:16}},{b:8500,d:500,o:-1}],
      [{b:-1,d:1,o:-1,r:-20},{b:11900,d:300,x:66,o:1,r:15,sX:1,sY:1,e:{x:6,r:6,sX:6,sY:6}},{b:12200,d:900,r:15,sX:1,sY:1,e:{r:16,sX:16,sY:16}},{b:13100,d:1100,x:-238,y:50,r:-15,sX:-1,sY:-1,e:{x:16,y:16,r:16,sX:16,sY:16}},{b:16400,d:2000,y:123,e:{y:5}}],
      [{b:-1,d:1,o:-0.7},{b:11900,d:600,r:12,e:{r:6}},{b:12500,d:2900,x:195,o:0.7,e:{x:16}},{b:17300,d:1100,x:54,y:259,r:18,e:{x:5,y:5,r:5}}],
      [{b:-1,d:1,o:-0.7},{b:11900,d:600,r:22,e:{r:6}},{b:12500,d:2900,x:-183,y:-82,o:0.7,e:{x:16,y:16}},{b:17000,d:1100,x:-74,y:232,r:-52,e:{x:5,y:5,r:5}}],
      [{b:-1,d:1,o:-0.7},{b:11900,d:600,r:-5,e:{r:6}},{b:12500,d:2900,x:-160,y:82,o:0.7,e:{x:16,y:16}},{b:16700,d:1100,x:-72,y:185,r:-25,e:{x:5,y:5,r:5}}],
      [{b:-1,d:1,o:-0.7},{b:11900,d:600,r:-12,e:{r:6}},{b:12500,d:2900,x:192,y:-8,o:0.7,e:{x:16,y:16}},{b:16400,d:1100,x:31,y:264,r:42,e:{x:5,y:5,r:5}}],
      [{b:9900,d:100,x:42,y:29},{b:10380,d:120,x:-29,y:-18,e:{x:3,y:3}},{b:10600,d:300,x:-37,y:-4,rX:45,sX:-0.3,sY:-0.3,e:{x:4,y:4,rX:16,sX:16,sY:16}},{b:11100,d:1300,x:178,y:300,rX:-45,sX:0.4,sY:0.4,e:{x:6,y:6,rX:15,sX:6,sY:6}}],
      [{b:-1,d:1,o:-0.5,sX:-1,sY:-1},{b:9600,d:100,sX:1,sY:1},{b:9700,d:100,o:-0.5,sX:0.1,sY:0.1},{b:9800,d:20,o:0.5,sX:-1.1,sY:-1.1,e:{sX:32,sY:32}},{b:10100,d:100,sX:1,sY:1},{b:10200,d:100,o:-0.5,sX:0.1,sY:0.1},{b:10300,d:20,o:0.5,sX:-1.1,sY:-1.1,e:{o:32,sX:32,sY:32}}],
      [{b:-1,d:1,o:-1},{b:8700,d:800,x:-190,y:-259,o:1,e:{x:7,y:7}}],
      [{b:1000,d:1500,x:-115,o:-1,e:{x:14}}],
      [{b:0,d:1000,r:360,e:{r:4}},{b:1000,d:1000,x:-220,e:{x:7}}],
      [{b:0,d:1000,x:160,e:{x:16}}],
      [{b:0,d:1000,x:55,y:-55,e:{x:16,y:16}}],
      [{b:0,d:1000,x:-50,y:-110,e:{x:16,y:16}}],
      [{b:-1,d:1,r:90},{b:6500,d:20,x:-180,c:{y:178.750,m:-173.250},e:{x:32,c:{y:32,m:32}}},{b:6800,d:700,sX:0.5,sY:0.5,e:{sX:1,sY:1}},{b:7500,d:800,r:-90,sX:-0.5,sY:-0.5,e:{r:16,sX:1,sY:1}}],
      [{b:2500,d:2000,y:-50,e:{y:16}},{b:4500,d:2000,y:50,c:{y:357.50},e:{y:16}},{b:6500,d:20,y:-180,c:{y:-357.50},e:{y:32,c:{y:32}}},{b:8500,d:16000,y:360},{b:25500,d:1200,y:-360,e:{y:19}}],
      [{b:-1,d:1,o:-1},{b:2800,d:3000,o:1}],
      [{b:-1,d:1,o:-1},{b:2760,d:3000,o:1}],
      [{b:-1,d:1,o:-1},{b:2720,d:3000,o:1}],
      [{b:-1,d:1,o:-1},{b:2680,d:3000,o:1}],
      [{b:-1,d:1,o:-1},{b:2640,d:3000,o:1}],
      [{b:-1,d:1,o:-1},{b:2600,d:3000,o:1}],
      [{b:-1,d:1,o:-1},{b:2560,d:3000,o:1}],
      [{b:-1,d:1,o:-1},{b:2520,d:3000,o:1}],
      [{b:-1,d:1,o:-1},{b:2480,d:3000,o:1}],
      [{b:-1,d:1,o:-1},{b:2440,d:3000,o:1}],
      [{b:-1,d:1,o:-1},{b:2400,d:2000,o:1}],
      [{b:-1,d:1,o:-1},{b:1400,d:1000,y:300,o:1,e:{y:7}}],
      [{b:-1,d:1,o:-1},{b:1200,d:1000,y:300,o:1,e:{y:7}}],
      [{b:-1,d:1,o:-1},{b:1000,d:1000,y:300,o:1,e:{y:7}}],
      [{b:6800,d:1100,r:-25,e:{r:7}},{b:8200,d:1000,r:25,e:{r:1}}],
      [{b:6000,d:600,x:-176,y:-170,r:-45,e:{x:16,y:16,r:16}},{b:6600,d:1000,x:171,y:80,r:-10,sX:0.2,sY:0.2,e:{x:7,y:7,r:7,sX:7,sY:7}},{b:8200,d:1000,x:66,y:12,r:35,e:{x:16,y:16,r:16}},{b:24300,d:1000,x:-262,y:-65,r:-50,e:{x:1,y:1,r:1}},{b:25300,d:600,x:29,y:-133,o:-1,r:15,e:{x:5,y:5,o:2,r:5}}],
      [{b:-1,d:1,rY:180},{b:6000,d:600,x:91,y:-281,r:135,e:{x:16,y:16,r:16}},{b:6600,d:1000,x:-160,y:-80,r:-10,sX:0.2,sY:0.2,e:{x:7,y:7,r:7,sX:7,sY:7}},{b:8200,d:1000,x:-64,y:368,r:-125,e:{x:2,y:2,r:2}}],
      [{b:-1,d:1,o:-1},{b:11100,d:3000,x:270,y:-260,o:1,e:{x:16,y:3,o:1}},{b:14100,d:1900,x:250,y:210,e:{x:6,y:3}},{b:16000,d:2000,x:-350,y:-280,e:{y:6}},{b:18000,d:2000,x:-350,y:400,o:-1,e:{y:5,o:1}}],
      [{b:11100,d:3000,x:-270,y:260,e:{x:16,y:3}},{b:14100,d:1900,x:-250,y:-210,e:{x:6,y:3}},{b:16000,d:2000,x:350,y:280,e:{y:6}},{b:18000,d:2000,x:350,y:-200,e:{y:5}}],
      [{b:-1,d:1,sX:-0.5,sY:-0.5},{b:0,d:2000,x:-395,y:-138,o:-0.5,r:-360,sX:1.0,kY:20,e:{x:5,y:5,o:1,r:5,sX:16,kY:16}},{b:2000,d:2000,x:-172,y:-29,o:0.5,r:-360,sX:-1.0,kY:-20,e:{x:6,y:6,o:1,r:6,sX:16,kY:16}},{b:4000,d:1100,x:-25,y:50,sY:0.75,kX:-40,e:{x:5,y:5,sY:5,kX:5}},{b:5100,d:1000,x:-25,y:50,sY:-0.75,kX:40,e:{x:6,y:6,sY:6,kX:6}},{b:6100,d:1000,x:-25,y:-95,sY:0.75,kX:20,e:{x:5,y:5,sY:5,kX:5}},{b:7100,d:1000,x:-25,y:-95,sY:-0.75,kX:-20,e:{x:6,y:6,sY:6,kX:6}},{b:8100,d:3000,x:271,y:271,sX:0.5,sY:0.5,e:{x:16,y:2,sX:1,sY:1}},{b:11100,d:3000,x:270,y:-260,o:-1,e:{x:16,y:3,o:1}},{b:17980,d:20,x:-100,y:-70},{b:18000,d:2000,x:-350,y:400,o:1,e:{y:5,o:1}},{b:20000,d:1000,y:-200,e:{y:3}},{b:21000,d:1500,x:100,y:470,r:360,sX:9,sY:9,e:{x:1,y:1,r:7,sX:1,sY:1}},{b:22500,d:1000,o:-1}],
      [{b:0,d:2000,x:-100,sX:0.5,kX:10,kY:-30,e:{x:14,sX:16,kX:7,kY:7}},{b:2000,d:2000,x:-100,sX:-0.5,kX:-10,kY:30,e:{x:16,sX:16,kX:16,kY:16}},{b:20000,d:1000,x:50,y:-120,sY:1,kX:-20,e:{x:3,y:3,sY:3,kX:3}},{b:21000,d:1500,x:-30,y:60,sY:-0.8,kX:20,e:{x:1,y:1,sY:16,kX:16}}],
      [{b:13000,d:1100,x:-266,y:-330,e:{x:16,y:16}},{b:14100,d:1900,x:265,y:242,e:{x:6,y:3}},{b:16000,d:500,x:50,y:50,o:-1,sX:1,sY:1,e:{x:12,y:12,sX:12,sY:12}}],
      [{b:-1,d:1,o:-1,sX:-0.1,sY:-0.1},{b:22000,d:1000,o:1,sX:0.1,sY:0.1,e:{sX:6,sY:6}},{b:24500,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.2,e:{x:7,sX:7,sY:7}},{b:27000,d:2000,x:-320,o:-0.3,e:{x:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:23500,d:1000,o:0.3},{b:24500,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:25500,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}},{b:27000,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.2,e:{x:7,sX:7,sY:7}},{b:29500,d:2000,x:-320,o:-0.3,e:{x:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:24500,d:2000,x:-320,o:0.3,e:{x:7}},{b:27000,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:28000,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}},{b:29500,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.2,e:{x:7,sX:7,sY:7}},{b:32000,d:2000,x:-320,o:-0.3,e:{x:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:27000,d:2000,x:-320,o:0.3,e:{x:7}},{b:29500,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:30500,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}},{b:32000,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.2,e:{x:7,sX:7,sY:7}},{b:34500,d:2000,x:-320,o:-0.3,e:{x:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:29500,d:2000,x:-320,o:0.3,e:{x:7}},{b:32000,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:33000,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}},{b:34500,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.2,e:{x:7,sX:7,sY:7}},{b:37000,d:2000,x:-320,o:-0.3,e:{x:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:32000,d:2000,x:-320,o:0.3,e:{x:7}},{b:34500,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:35500,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}},{b:37000,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.2,e:{x:7,sX:7,sY:7}},{b:39500,d:2000,x:-320,o:-0.3,e:{x:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:34500,d:2000,x:-320,o:0.3,e:{x:7}},{b:37000,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:38000,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}},{b:39500,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.2,e:{x:7,sX:7,sY:7}},{b:42000,d:2000,x:-320,o:-0.3,e:{x:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:37000,d:2000,x:-320,o:0.3,e:{x:7}},{b:39500,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:40500,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}},{b:42000,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.2,e:{x:7,sX:7,sY:7}},{b:44500,d:2000,x:-320,o:-0.3,e:{x:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:39500,d:2000,x:-320,o:0.3,e:{x:7}},{b:42000,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:43000,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}},{b:44500,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.2,e:{x:7,sX:7,sY:7}},{b:47000,d:2000,x:-320,o:-0.3,e:{x:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:42000,d:2000,x:-320,o:0.3,e:{x:7}},{b:44500,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:45500,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}},{b:47000,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.1,e:{x:7,sX:7,sY:7}},{b:49500,d:2000,x:-320,o:-0.3,e:{x:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:44500,d:2000,x:-320,o:0.3,e:{x:7}},{b:47000,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:48000,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}},{b:49500,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.2,e:{x:7,sX:7,sY:7}},{b:52000,d:2000,x:-320,o:-0.3,e:{x:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:47000,d:2000,x:-320,o:0.3,e:{x:7}},{b:49500,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:50500,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}},{b:52000,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.2,e:{x:7,sX:7,sY:7}},{b:54500,d:2000,x:-320,o:-0.3,e:{x:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:49500,d:2000,x:-320,o:0.3,e:{x:7}},{b:52000,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:53000,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}},{b:54500,d:2000,x:-320,o:-0.7,sX:-0.2,sY:-0.2,e:{x:7,sX:7,sY:7}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:52000,d:2000,x:-320,o:0.3,e:{x:7}},{b:54500,d:1000,x:-160,o:0.2,rY:-30,sX:0.1,sY:0.1,e:{x:5,rY:16,sX:5,sY:5}},{b:55500,d:1000,x:-160,o:0.5,rY:30,sX:0.1,sY:0.1,e:{x:6,rY:16,sX:6,sY:6}}],
      [{b:-1,d:1,o:-1,sX:-0.2,sY:-0.2},{b:54500,d:2000,x:-320,o:0.3,e:{x:7}}]
      ];

      var jssor_1_options = {
        $AutoPlay: 1,
        $Idle: 0,
        $SlideshowOptions: {
          $Class: $JssorSlideshowRunner$,
          $Transitions: jssor_1_SlideshowTransitions
        },
        $CaptionSliderOptions: {
          $Class: $JssorCaptionSlideo$,
          $Transitions: jssor_1_SlideoTransitions
        },
        $ArrowNavigatorOptions: {
          $Class: $JssorArrowNavigator$
        },
        $BulletNavigatorOptions: {
          $Class: $JssorBulletNavigator$
        }
      };

      var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

      /*#region responsive code begin*/

      var MAX_WIDTH = 980;

      function ScaleSlider() {
        var containerElement = jssor_1_slider.$Elmt.parentNode;
        var containerWidth = containerElement.clientWidth;

        if (containerWidth) {

          var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

          jssor_1_slider.$ScaleWidth(expectedWidth);
        }
        else {
          window.setTimeout(ScaleSlider, 30);
        }
      }

      ScaleSlider();

      $Jssor$.$AddEvent(window, "load", ScaleSlider);
      $Jssor$.$AddEvent(window, "resize", ScaleSlider);
      $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
      /*#endregion responsive code end*/
    };
  </script>
</head>
<body id="top">
  <div class="wrapper row0">
    <div id="topbar" class="clear"> 
      <nav>
        <ul>
          <li><a href="<?php echo base_url();?>home">الرئسيه</a></li>
          <li><a href="<?php echo base_url();?>home/contactus">أتصل بنا </a></li>
          <li><a href="pages/login.html">تسجيل الدخول</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <div class="wrapper row1">
    <header id="header" class="clear"> 
      <div id="logo" class="fl_left">
        <img src="<?php echo base_url();?>assets/images/images/demo/gallery/logo2.png">
        <h1><a href="<?php echo base_url();?>home">نادي الصيد الرياضي </a></h1>
      </div>
      <div class="fl_right">
        <form class="clear" method="post" action="#">
          <fieldset>
            <input type="text" value="" placeholder="بحث ">
            <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
          </fieldset>
        </form>
      </div>
    </header>
  </div>
  <!-- ################################################################################################ -->
  <div class="wrapper row2">
    <div class="rounded">
      <nav id="mainav" class="clear"> 
        <!-- ################################################################################################ -->
        <ul class="clear">
          <li class="active"><a href="<?php echo base_url("home/news");?>">الأخبار</a></li>
          <li><a class="drop" href="">عن النادي</a>
            <ul>
              <li><a href="<?php echo base_url("home/history");?>">تاريخ النادي</a></li>
              <li><a href="<?php echo base_url("home");?>">مجلس الأداره</a></li>
              <li><a href="<?php echo base_url("home");?>">شئون العضويه </a></li>
              <li><a href="<?php echo base_url("home/project");?>">منشأت النادي</a></li>
              <li><a href="<?php echo base_url("home/project");?>">المشاريع الجديده</a></li>
              <li><a href="pages/login.html">تسجيل الدخول</a></li>
              
            </ul>
          </li>
          <li><a class="drop" href="">كره القدم</a>
            <ul>
              <li><a   href="">الفريق الأول</a>
                <ul>
                  <li><a href="<?php echo base_url("home/matches");?>">جدول المباريات</a></li>
                  <li><a href="<?php echo base_url("home/matches");?>">نتائج المباريات</a></li>
                  <li><a href="<?php echo base_url("home/rank");?>">ترتيب المباريات</a></li>
                </ul>
                
              </li>
              <li><a  href="">قطاع الناشئين</a>
                <ul>
                  <li><a href="<?php echo base_url("home/matches");?>">جدول المباريات</a></li>
                  <li><a href="<?php echo base_url("home/matches");?>">نتائج المباريات</a></li>
                  <li><a href="<?php echo base_url("home/rank");?>">ترتيب المباريات</a></li>
                </ul>
              </li>
              <li><a href="">الأكاديميه </a>
               <ul>
                <li><a href="<?php echo base_url("home/academy_join");?>"> أشتراك</a></li>
                <li><a href="<?php echo base_url("home/academy");?>">مميزات الأكاديميه</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a class="drop" href="">الأنشطه </a>
          <ul>
            <li><a href="<?php echo base_url("home/activite");?>">الأنشطه الأجتماعيه</a></li>
            <li><a  href="<?php echo base_url("home/trip");?>">الرحلات </a> </li>
            <li><a href="<?php echo base_url("home/party");?>">الحفلات </a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url("home/achive");?>">أنجازات</a></li>
        <li><a class="drop" href="">الميديا </a>
          <ul>
            <li><a href="<?php echo base_url("home/gallery");?>">مكتبه الصور</a></li>
            <li><a href="<?php echo base_url("home/videos");?>">البومات الفيديو</a></li>
          </ul>
        </li>  
        <li><a class="drop"  href="">رأيك يهمنا</a>
          <ul>
           <li><a href="pages/OpInt.html">شكاوي و مقترحات</a></li>
         </ul>
       </li>
       <li><a href="<?php echo base_url("home/contactus");?>">أتصل بنا</a></li>
     </ul>
     <!-- ################################################################################################ --> 
   </nav>
 </div>
</div>