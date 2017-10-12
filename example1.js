1 function sketchProc(processing) {
2   // Override draw function, by default it will be called 60 times per second
3   processing.draw = function() {
4     // determine center and max clock arm length
5     var centerX = processing.width / 2, centerY = processing.height / 2;
6     var maxArmLength = Math.min(centerX, centerY);
7
8     function drawArm(position, lengthScale, weight) {
9       processing.strokeWeight(weight);
10       processing.line(centerX, centerY,
11         centerX + Math.sin(position * 2 * Math.PI) * lengthScale * maxArmLength,
12         centerY - Math.cos(position * 2 * Math.PI) * lengthScale * maxArmLength);
13     }
14
15     // erase background
16     processing.background(224);
17
18     var now = new Date();
19
20     // Moving hours arm by small increments
21     var hoursPosition = (now.getHours() % 12 + now.getMinutes() / 60) / 12;
22     drawArm(hoursPosition, 0.5, 5);
23
24     // Moving minutes arm by small increments
25     var minutesPosition = (now.getMinutes() + now.getSeconds() / 60) / 60;
26     drawArm(minutesPosition, 0.80, 3);
27
28     // Moving hour arm by second increments
29     var secondsPosition = now.getSeconds() / 60;
30     drawArm(secondsPosition, 0.90, 1);
31   };
32 }
33
34 var canvas = document.getElementById("example1");
35 // attaching the sketchProc function to the canvas
36 var processingInstance = new Processing(canvas, sketchProc);
