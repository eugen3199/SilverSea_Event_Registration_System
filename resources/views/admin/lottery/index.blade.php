<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMP - Lottery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Herr+Von+Muellerhoff&display=swap" rel="stylesheet"> 
    <style type="text/css">
        @font-face {
            font-family: "Gugi";
            src: url("Gugi-Regular.ttf");
        }

        body {
            font-family: 'Gugi', sans-serif;
            background-color: rgba(60,249,247,1);
/*            color: grey;*/
        }

        .con{
            font-family: 'Herr Von Muellerhoff', cursive;
            font-size: 70px;
        }

        .party{
            font-family: 'Gugi', sans-serif;
            font-size: 40px;
            display: none;
        }

        #confetti{
/*          background: rgb(60,249,247);*/
          background: linear-gradient(0deg, rgba(60,249,247,1) 0%, rgba(172,242,163,1) 46%, rgba(255,255,206,1) 100%);
          height: 100%;
          left: 0px;
          position: fixed;
          top: 0px;
          width: 100%;
          z-index: -1;
          transition: opacity 500ms;
        }

        .centered {
          position: fixed;
          top: 50%;
          left: 50%;
          /* bring your own prefixes */
          transform: translate(-50%, -50%);
        }

        .box{
          width: 800px;
          height: 700px;
          background-color: #fff;
          border-radius: 20px;
          text-align: center;
          background-color: rgba(255, 255, 255, 0.9);
          padding-bottom: 50px;
          box-shadow: -2px 4px 10px 1px #888;
        }

        #winner{
            display: none;
        }

        #banner{
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .container{
            width: 100%;
            height: 100%;
        }

        #trophy{
            margin-top: -60px;
            background-color: rgba(255, 255, 255, 1);
            border-radius: 100px;
            padding: 15px;
        }

        button{
            padding: 10px;
            border-radius: 10px;
            background-color: rgba(140, 255, 144, 1.0);
            border: none;
            font-size: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body> 
    <div id="confetti" style="display: none;"></div>
    <div class="box centered">
      <img id="banner" src="{{ url('images/banner.jpg') }}" width="100%" align="center">
      <img id="trophy" src="{{ url('images/trophy.png')}}" height="150px" align="center">
      <div class="centered">
        <div class="centered">
            <br>
            <br>
            <h2 class="party" id="twi">
                <br>
                <br>
                <nobr>The Winner is...!</nobr></h2>
            <h1>
                <div class="countdown" id="countdown"></div>
            </h1>
            <!-- <button class="btn" id="btn" onclick="start_countdown()">Start Countdown</button> -->
            <h1 id="enter"><br><br><br><nobr>Press Enter to start countdown.</nobr></h1>
        </div>
        <div class="container">
            <div id="winner">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h2 class="con">Congratulations!</h2>
                <h1><nobr>{{ $winner->name }}</nobr></h1>
                <h2> {{ $winner->conf_id }} </h2>
                <a href="/lottery"><button>Restart</button></a>
            </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.js"></script>
    <script type="text/javascript">
        cddisable=false;
        // var input = document.getElementById("myInput");
        document.addEventListener("keypress", function(event) {
          if (event.key === "Enter" && cddisable == false) {
            cddisable = true;
            start_countdown();

          }
      });
    </script>
    <script type="text/javascript">
        var count = 3;
        var timer;

        function endCountdown() {
            document.getElementById("twi").style.display = "none";
            document.getElementById("countdown").style.display = "none";
            document.getElementById("countdown").style.fontSize = "x-large";
            // document.getElementById("trophy").style.display = "block";
            document.getElementById("winner").style.display = "block";
            bg_effect();
        }

        function handleTimer() {
          if(count === 0) {
            $('#countdown').html(count);
            clearInterval(timer);
            endCountdown();
          } else {
            $('#countdown').html(count);
            count--;
          }
        }

        function start_countdown() {
            document.getElementById("twi").style.display = "block";
            document.getElementById("enter").style.display = "none";
            timer = setInterval(function() { handleTimer(count); }, 1000);
        }
    </script>
    <script type="text/javascript">
        /* Confetti by Patrik Svensson (http://metervara.net) */
            function bg_effect(){
                document.getElementById("confetti").style.display = "block";
                $(document).ready(function() {
                            var frameRate = 30;
                            var dt = 1.0 / frameRate;
                            var DEG_TO_RAD = Math.PI / 180;
                            var RAD_TO_DEG = 180 / Math.PI;
                            var colors = [
                                ["#df0049", "#660671"],
                                ["#00e857", "#005291"],
                                ["#2bebbc", "#05798a"],
                                ["#ffd200", "#b06c00"]
                            ];
            
                            function Vector2(_x, _y) {
                                this.x = _x, this.y = _y;
                                this.Length = function() {
                                    return Math.sqrt(this.SqrLength());
                                }
                                this.SqrLength = function() {
                                    return this.x * this.x + this.y * this.y;
                                }
                                this.Equals = function(_vec0, _vec1) {
                                    return _vec0.x == _vec1.x && _vec0.y == _vec1.y;
                                }
                                this.Add = function(_vec) {
                                    this.x += _vec.x;
                                    this.y += _vec.y;
                                }
                                this.Sub = function(_vec) {
                                    this.x -= _vec.x;
                                    this.y -= _vec.y;
                                }
                                this.Div = function(_f) {
                                    this.x /= _f;
                                    this.y /= _f;
                                }
                                this.Mul = function(_f) {
                                    this.x *= _f;
                                    this.y *= _f;
                                }
                                this.Normalize = function() {
                                    var sqrLen = this.SqrLength();
                                    if (sqrLen != 0) {
                                        var factor = 1.0 / Math.sqrt(sqrLen);
                                        this.x *= factor;
                                        this.y *= factor;
                                    }
                                }
                                this.Normalized = function() {
                                    var sqrLen = this.SqrLength();
                                    if (sqrLen != 0) {
                                        var factor = 1.0 / Math.sqrt(sqrLen);
                                        return new Vector2(this.x * factor, this.y * factor);
                                    }
                                    return new Vector2(0, 0);
                                }
                            }
                            Vector2.Lerp = function(_vec0, _vec1, _t) {
                                return new Vector2((_vec1.x - _vec0.x) * _t + _vec0.x, (_vec1.y - _vec0.y) * _t + _vec0.y);
                            }
                            Vector2.Distance = function(_vec0, _vec1) {
                                return Math.sqrt(Vector2.SqrDistance(_vec0, _vec1));
                            }
                            Vector2.SqrDistance = function(_vec0, _vec1) {
                                var x = _vec0.x - _vec1.x;
                                var y = _vec0.y - _vec1.y;
                                return (x * x + y * y + z * z);
                            }
                            Vector2.Scale = function(_vec0, _vec1) {
                                return new Vector2(_vec0.x * _vec1.x, _vec0.y * _vec1.y);
                            }
                            Vector2.Min = function(_vec0, _vec1) {
                                return new Vector2(Math.min(_vec0.x, _vec1.x), Math.min(_vec0.y, _vec1.y));
                            }
                            Vector2.Max = function(_vec0, _vec1) {
                                return new Vector2(Math.max(_vec0.x, _vec1.x), Math.max(_vec0.y, _vec1.y));
                            }
                            Vector2.ClampMagnitude = function(_vec0, _len) {
                                var vecNorm = _vec0.Normalized;
                                return new Vector2(vecNorm.x * _len, vecNorm.y * _len);
                            }
                            Vector2.Sub = function(_vec0, _vec1) {
                                return new Vector2(_vec0.x - _vec1.x, _vec0.y - _vec1.y, _vec0.z - _vec1.z);
                            }
            
                            function EulerMass(_x, _y, _mass, _drag) {
                                this.position = new Vector2(_x, _y);
                                this.mass = _mass;
                                this.drag = _drag;
                                this.force = new Vector2(0, 0);
                                this.velocity = new Vector2(0, 0);
                                this.AddForce = function(_f) {
                                    this.force.Add(_f);
                                }
                                this.Integrate = function(_dt) {
                                    var acc = this.CurrentForce(this.position);
                                    acc.Div(this.mass);
                                    var posDelta = new Vector2(this.velocity.x, this.velocity.y);
                                    posDelta.Mul(_dt);
                                    this.position.Add(posDelta);
                                    acc.Mul(_dt);
                                    this.velocity.Add(acc);
                                    this.force = new Vector2(0, 0);
                                }
                                this.CurrentForce = function(_pos, _vel) {
                                    var totalForce = new Vector2(this.force.x, this.force.y);
                                    var speed = this.velocity.Length();
                                    var dragVel = new Vector2(this.velocity.x, this.velocity.y);
                                    dragVel.Mul(this.drag * this.mass * speed);
                                    totalForce.Sub(dragVel);
                                    return totalForce;
                                }
                            }
            
                            function ConfettiPaper(_x, _y) {
                                this.pos = new Vector2(_x, _y);
                                this.rotationSpeed = Math.random() * 600 + 800;
                                this.angle = DEG_TO_RAD * Math.random() * 360;
                                this.rotation = DEG_TO_RAD * Math.random() * 360;
                                this.cosA = 1.0;
                                this.size = 5.0;
                                this.oscillationSpeed = Math.random() * 1.5 + 0.5;
                                this.xSpeed = 40.0;
                                this.ySpeed = Math.random() * 60 + 50.0;
                                this.corners = new Array();
                                this.time = Math.random();
                                var ci = Math.round(Math.random() * (colors.length - 1));
                                this.frontColor = colors[ci][0];
                                this.backColor = colors[ci][1];
                                for (var i = 0; i < 4; i++) {
                                    var dx = Math.cos(this.angle + DEG_TO_RAD * (i * 90 + 45));
                                    var dy = Math.sin(this.angle + DEG_TO_RAD * (i * 90 + 45));
                                    this.corners[i] = new Vector2(dx, dy);
                                }
                                this.Update = function(_dt) {
                                    this.time += _dt;
                                    this.rotation += this.rotationSpeed * _dt;
                                    this.cosA = Math.cos(DEG_TO_RAD * this.rotation);
                                    this.pos.x += Math.cos(this.time * this.oscillationSpeed) * this.xSpeed * _dt
                                    this.pos.y += this.ySpeed * _dt;
                                    if (this.pos.y > ConfettiPaper.bounds.y) {
                                        this.pos.x = Math.random() * ConfettiPaper.bounds.x;
                                        this.pos.y = 0;
                                    }
                                }
                                this.Draw = function(_g) {
                                    if (this.cosA > 0) {
                                        _g.fillStyle = this.frontColor;
                                    } else {
                                        _g.fillStyle = this.backColor;
                                    }
                                    _g.beginPath();
                                    _g.moveTo(this.pos.x + this.corners[0].x * this.size, this.pos.y + this.corners[0].y * this.size * this.cosA);
                                    for (var i = 1; i < 4; i++) {
                                        _g.lineTo(this.pos.x + this.corners[i].x * this.size, this.pos.y + this.corners[i].y * this.size * this.cosA);
                                    }
                                    _g.closePath();
                                    _g.fill();
                                }
                            }
                            ConfettiPaper.bounds = new Vector2(0, 0);
            
                            function ConfettiRibbon(_x, _y, _count, _dist, _thickness, _angle, _mass, _drag) {
                                this.particleDist = _dist;
                                this.particleCount = _count;
                                this.particleMass = _mass;
                                this.particleDrag = _drag;
                                this.particles = new Array();
                                var ci = Math.round(Math.random() * (colors.length - 1));
                                this.frontColor = colors[ci][0];
                                this.backColor = colors[ci][1];
                                this.xOff = Math.cos(DEG_TO_RAD * _angle) * _thickness;
                                this.yOff = Math.sin(DEG_TO_RAD * _angle) * _thickness;
                                this.position = new Vector2(_x, _y);
                                this.prevPosition = new Vector2(_x, _y);
                                this.velocityInherit = Math.random() * 2 + 4;
                                this.time = Math.random() * 100;
                                this.oscillationSpeed = Math.random() * 2 + 2;
                                this.oscillationDistance = Math.random() * 40 + 40;
                                this.ySpeed = Math.random() * 40 + 80;
                                for (var i = 0; i < this.particleCount; i++) {
                                    this.particles[i] = new EulerMass(_x, _y - i * this.particleDist, this.particleMass, this.particleDrag);
                                }
                                this.Update = function(_dt) {
                                    var i = 0;
                                    this.time += _dt * this.oscillationSpeed;
                                    this.position.y += this.ySpeed * _dt;
                                    this.position.x += Math.cos(this.time) * this.oscillationDistance * _dt;
                                    this.particles[0].position = this.position;
                                    var dX = this.prevPosition.x - this.position.x;
                                    var dY = this.prevPosition.y - this.position.y;
                                    var delta = Math.sqrt(dX * dX + dY * dY);
                                    this.prevPosition = new Vector2(this.position.x, this.position.y);
                                    for (i = 1; i < this.particleCount; i++) {
                                        var dirP = Vector2.Sub(this.particles[i - 1].position, this.particles[i].position);
                                        dirP.Normalize();
                                        dirP.Mul((delta / _dt) * this.velocityInherit);
                                        this.particles[i].AddForce(dirP);
                                    }
                                    for (i = 1; i < this.particleCount; i++) {
                                        this.particles[i].Integrate(_dt);
                                    }
                                    for (i = 1; i < this.particleCount; i++) {
                                        var rp2 = new Vector2(this.particles[i].position.x, this.particles[i].position.y);
                                        rp2.Sub(this.particles[i - 1].position);
                                        rp2.Normalize();
                                        rp2.Mul(this.particleDist);
                                        rp2.Add(this.particles[i - 1].position);
                                        this.particles[i].position = rp2;
                                    }
                                    if (this.position.y > ConfettiRibbon.bounds.y + this.particleDist * this.particleCount) {
                                        this.Reset();
                                    }
                                }
                                this.Reset = function() {
                                    this.position.y = -Math.random() * ConfettiRibbon.bounds.y;
                                    this.position.x = Math.random() * ConfettiRibbon.bounds.x;
                                    this.prevPosition = new Vector2(this.position.x, this.position.y);
                                    this.velocityInherit = Math.random() * 2 + 4;
                                    this.time = Math.random() * 100;
                                    this.oscillationSpeed = Math.random() * 2.0 + 1.5;
                                    this.oscillationDistance = Math.random() * 40 + 40;
                                    this.ySpeed = Math.random() * 40 + 80;
                                    var ci = Math.round(Math.random() * (colors.length - 1));
                                    this.frontColor = colors[ci][0];
                                    this.backColor = colors[ci][1];
                                    this.particles = new Array();
                                    for (var i = 0; i < this.particleCount; i++) {
                                        this.particles[i] = new EulerMass(this.position.x, this.position.y - i * this.particleDist, this.particleMass, this.particleDrag);
                                    }
                                }
                                this.Draw = function(_g) {
                                    for (var i = 0; i < this.particleCount - 1; i++) {
                                        var p0 = new Vector2(this.particles[i].position.x + this.xOff, this.particles[i].position.y + this.yOff);
                                        var p1 = new Vector2(this.particles[i + 1].position.x + this.xOff, this.particles[i + 1].position.y + this.yOff);
                                        if (this.Side(this.particles[i].position.x, this.particles[i].position.y, this.particles[i + 1].position.x, this.particles[i + 1].position.y, p1.x, p1.y) < 0) {
                                            _g.fillStyle = this.frontColor;
                                            _g.strokeStyle = this.frontColor;
                                        } else {
                                            _g.fillStyle = this.backColor;
                                            _g.strokeStyle = this.backColor;
                                        }
                                        if (i == 0) {
                                            _g.beginPath();
                                            _g.moveTo(this.particles[i].position.x, this.particles[i].position.y);
                                            _g.lineTo(this.particles[i + 1].position.x, this.particles[i + 1].position.y);
                                            _g.lineTo((this.particles[i + 1].position.x + p1.x) * 0.5, (this.particles[i + 1].position.y + p1.y) * 0.5);
                                            _g.closePath();
                                            _g.stroke();
                                            _g.fill();
                                            _g.beginPath();
                                            _g.moveTo(p1.x, p1.y);
                                            _g.lineTo(p0.x, p0.y);
                                            _g.lineTo((this.particles[i + 1].position.x + p1.x) * 0.5, (this.particles[i + 1].position.y + p1.y) * 0.5);
                                            _g.closePath();
                                            _g.stroke();
                                            _g.fill();
                                        } else if (i == this.particleCount - 2) {
                                            _g.beginPath();
                                            _g.moveTo(this.particles[i].position.x, this.particles[i].position.y);
                                            _g.lineTo(this.particles[i + 1].position.x, this.particles[i + 1].position.y);
                                            _g.lineTo((this.particles[i].position.x + p0.x) * 0.5, (this.particles[i].position.y + p0.y) * 0.5);
                                            _g.closePath();
                                            _g.stroke();
                                            _g.fill();
                                            _g.beginPath();
                                            _g.moveTo(p1.x, p1.y);
                                            _g.lineTo(p0.x, p0.y);
                                            _g.lineTo((this.particles[i].position.x + p0.x) * 0.5, (this.particles[i].position.y + p0.y) * 0.5);
                                            _g.closePath();
                                            _g.stroke();
                                            _g.fill();
                                        } else {
                                            _g.beginPath();
                                            _g.moveTo(this.particles[i].position.x, this.particles[i].position.y);
                                            _g.lineTo(this.particles[i + 1].position.x, this.particles[i + 1].position.y);
                                            _g.lineTo(p1.x, p1.y);
                                            _g.lineTo(p0.x, p0.y);
                                            _g.closePath();
                                            _g.stroke();
                                            _g.fill();
                                        }
                                    }
                                }
                                this.Side = function(x1, y1, x2, y2, x3, y3) {
                                    return ((x1 - x2) * (y3 - y2) - (y1 - y2) * (x3 - x2));
                                }
                            }
                            ConfettiRibbon.bounds = new Vector2(0, 0);
                            confetti = {};
                            confetti.Context = function(parent) {
                                var i = 0;
                                var canvasParent = document.getElementById(parent);
                                var canvas = document.createElement('canvas');
                                canvas.width = canvasParent.offsetWidth;
                                canvas.height = canvasParent.offsetHeight;
                                canvasParent.appendChild(canvas);
                                var context = canvas.getContext('2d');
                                var interval = null;
                                var confettiRibbonCount = 40;
                                var rpCount = 30;
                                var rpDist = 8.0;
                                var rpThick = 8.0;
                                var confettiRibbons = new Array();
                                ConfettiRibbon.bounds = new Vector2(canvas.width, canvas.height);
                                for (i = 0; i < confettiRibbonCount; i++) {
                                    confettiRibbons[i] = new ConfettiRibbon(Math.random() * canvas.width, -Math.random() * canvas.height * 2, rpCount, rpDist, rpThick, 45, 1, 0.05);
                                }
                                var confettiPaperCount = 200;
                                var confettiPapers = new Array();
                                ConfettiPaper.bounds = new Vector2(canvas.width, canvas.height);
                                for (i = 0; i < confettiPaperCount; i++) {
                                    confettiPapers[i] = new ConfettiPaper(Math.random() * canvas.width, Math.random() * canvas.height);
                                }
                                this.resize = function() {
                                    canvas.width = canvasParent.offsetWidth;
                                    canvas.height = canvasParent.offsetHeight;
                                    ConfettiPaper.bounds = new Vector2(canvas.width, canvas.height);
                                    ConfettiRibbon.bounds = new Vector2(canvas.width, canvas.height);
                                }
                                this.start = function() {
                                    this.stop()
                                    var context = this
                                    this.interval = setInterval(function() {
                                        confetti.update();
                                    }, 1000.0 / frameRate)
                                }
                                this.stop = function() {
                                    clearInterval(this.interval);
                                }
                                this.update = function() {
                                    var i = 0;
                                    context.clearRect(0, 0, canvas.width, canvas.height);
                                    for (i = 0; i < confettiPaperCount; i++) {
                                        confettiPapers[i].Update(dt);
                                        confettiPapers[i].Draw(context);
                                    }
                                    for (i = 0; i < confettiRibbonCount; i++) {
                                        confettiRibbons[i].Update(dt);
                                        confettiRibbons[i].Draw(context);
                                    }
                                }
                            }
                            var confetti = new confetti.Context('confetti');
                            confetti.start();
                            $(window).resize(function() {
                                confetti.resize();
                            });
                        });}
    </script>
</body>
</html>