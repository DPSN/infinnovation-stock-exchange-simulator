 var invertTriangle = function(triangle) {
    triangle.className = 'inverted';
};
var unInvertTriangle = function(triangle) {
    triangle.className = 'not_inverted';
};
var changeStock = function(triangleGroup, gain, value) {
      var triangleE = triangleGroup.childNodes[0];
      var valueE = triangleGroup.childNodes[2];
      valueE.innerHTML = 'INR' + value;
      if(gain) unInvertTriangle(triangleE);
      else invertTriangle(triangleE);
};