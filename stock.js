 var invertTriangle = function(triangle) {
    triangle.className = 'inverted';
};
var unInvertTriangle = function(triangle) {
    triangle.className = 'not_inverted';
};
var changeStock = function(triangle, gain, value) {
      triangle.innerHTML = 'INR' + value;
      if(gain) unInvertTriangle();
      else invertTriangle();
};