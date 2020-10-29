"use strict";
/*
* minnak Loading class constructor
*/
function minnakLoading (){
   
    // check browser for transition event support
    this.transitionEvent = this.whichTransitionEvent();
}
/*
* Method to hide loading layer, after the fade-out animation
*/
minnakLoading.prototype.hideAfterAnimation = function(){
 // when transition event detected and supported by browser 
 if(this.transitionEvent){
   // get the class object so we can access it 
   // inside the event handler
   var _self = this;
  // bind the event listener to its handler
  document.addEventListener(this.transitionEvent, function(event) {
   /* 
    its important to note that transition events doesn't 
    works properly on display:none elements, so we use visibility 
    property instead of display property
   */
     // check for loaded class availability
     if(_self.pageOverlayElement.className.match(/\bloaded\b/)){
       // hide loading layer using visibility property
       _self.pageOverlayElement.style.visibility = "hidden";
     }
  });
 // transition event are not supported by the current browser
 }else{
  // check for our loading layer element 
  if (this.pageOverlayElement){
     // hide element
     this.pageOverlayElement.style.visibility = "hidden";
     // show a warn message on the browser console
     console.warn("Transitions not supported by browser");
  }
 }
}
/* 
* Method to check transition events support, 
* it also allow us to get the correct transition event name for each known browser
*/
minnakLoading.prototype.whichTransitionEvent = function(){
  // hack used in bootstrap to perform detection 
  // by creaing an empty div 
  var el = document.createElement("div")
  // transition event names for each browser, you can add more
    var transEndEventNames = {
        WebkitTransition : "webkitTransitionEnd",
        MozTransition    : "transitionend",
        OTransition      : "oTransitionEnd otransitionend",
        transition       : "transitionend"
    }
  // test each event name  to get  the right one 
  // for this browser then return it
  for (var name in transEndEventNames) {
     if (el.style[name] !== undefined) {
            return transEndEventNames[name];
      }
  }
   // if no event compatible with this browser, 
   // we always return false
    return false 
}
/* 
* Method to show or hide our loading spinner
* @param    boolean    state    if true it will show our loading spinner, if false it will hide it
*/
minnakLoading.prototype.loading = function(state){
 // get the overlay div, and store it in a property, 
 // so we can reuse it later 
 this.pageOverlayElement =  document.getElementById("page-overlay");
    // if we want to show the loading spinner
    if (state == true){
       // check for loaded class availability
        if (this.pageOverlayElement.className.match(/\bloaded\b/)){
           // when showing loading, we should make it visible first
           this.pageOverlayElement.style.visibility = "visible";
           /* 
           replace loaded class by loading class
           its important to note that transition events doesn't
           works properly on display:none elements, 
           that's why we use visibility property 
           instead of display property 
           */
           this.pageOverlayElement.className = this.pageOverlayElement.className.replace(/\bloaded\b/, "loading");
        }
    // if we want to hide the loading spinner
    }else{
       // check for loading class availability
       if (this.pageOverlayElement.className.match(/\bloading\b/)){
          // replace loading class by loaded class
          this.pageOverlayElement.className = this.pageOverlayElement.className.replace(/\bloading\b/, "loaded");
        }
    }
}

// instantiate our loading class
var minnakPageLoading = new minnakLoading();
// bind with transition end event (hide after fade-out)
minnakPageLoading.hideAfterAnimation();
// event trigger on document when DOM is ready
document.addEventListener("DOMContentLoaded", function(){
    // show loading
    minnakPageLoading.loading(true);   
});
// event trigger when everything is loaded
window.onload = function(){
    minnakPageLoading.loading(false);
}