/**
 * Magnet module
 * Mouse interactions
 */

 import Utilities from '../utilities/utilities';
 import { gsap } from 'gsap';
 
 const Deepmerge = require('deepmerge');
  
 export default class Magnet {
     /**
     * @param {string} element - Selector
     * @param {Object} options - User options
     */
     constructor(element, options) {
         this.element = element || '.js-magnet';
  
         window.addEventListener('DOMContentLoaded', () => {
             this.init();
         });
     }
  
  
     init() {
  
         if (this.element.length == 0) {
             return;		
         }
  
         var hoverMouse = function ($el) {
             $el.each(function () {
                 var $self = jQuery(this);
                 var hover = false;
                 var offsetHoverMax = $self.attr('offset-hover-max') || 0.7;
                 var offsetHoverMin = $self.attr('offset-hover-min') || 0.5;
  
                 var attachEventsListener = function () {
                     jQuery(window).on('mousemove', function (e) {
                         //
                         var hoverArea = hover ? offsetHoverMax : offsetHoverMin;
 
                         // cursor
                         var cursor = {
                             x: e.clientX,
                             y: e.clientY + jQuery(window).scrollTop(),
                         };
 
                         // size
                         var width = $self.outerWidth();
                         var height = $self.outerHeight();
 
                         // position
                         var offset = $self.offset();
                         var elPos = {
                             x: offset.left + width / 2,
                             y: offset.top + height / 2,
                         };
 
                         // comparaison
                         var x = cursor.x - elPos.x;
                         var y = cursor.y - elPos.y;
 
                         // dist
                         var dist = Math.sqrt(x * x + y * y);
 
                         // mutex hover
                         var mutHover = false;
 
                         // anim
                         if (dist < width * hoverArea) {
                             mutHover = true;
                             if (!hover) {
                                 hover = true;
                             }
                             onHover(x, y);
                         }
 
                         // reset
                         if (!mutHover && hover) {
                             onLeave();
                             hover = false;
                         }
                     });
                 };
  
                 var onHover = function (x, y) {
                     gsap.to($self, 0.4, {
                         x: x * 0.8,
                         y: y * 0.8,
                         //scale: .9,
                         rotation: x * 0.05,
                         ease: 'power3inOut',
                     });
                 };
                 var onLeave = function () {
                     gsap.to($self, 0.7, {
                         x: 0,
                         y: 0,
                         scale: 1,
                         rotation: 0,
                         ease: 'elastic',
                     });
                 };
  
                 attachEventsListener();
             });
         };
  
         hoverMouse(jQuery(this.element));	
          
     }
  
 } 