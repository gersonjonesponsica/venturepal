window.onload=function(){for(var e=document.getElementsByClassName("heart"),t=document.getElementsByClassName("tabitem"),a=document.getElementsByClassName("box"),s=function(e){e.preventDefault();for(var s=this.getElementsByTagName("a")[0],n=this.getElementsByTagName("span")[0],l=s.getAttribute("href").replace("#",""),c=0;c<a.length;c++)a[c].className=a[c].className.replace(/(?:^|\s)show(?!\S)/g,"");document.getElementById(l).className+=" show";for(c=0;c<t.length;c++)t[c].className=t[c].className.replace(/(?:^|\s)active(?!\S)/g,"");this.className+=" active",n.className+="active";var i=s.getBoundingClientRect().left,m=s.getBoundingClientRect().top,o=e.clientX-i,g=e.clientY-m;n.style.top=g+"px",n.style.left=o+"px",n.className="clicked",n.addEventListener("webkitAnimationEnd",function(e){this.className=""},!1)},n=0;n<t.length;n++)t[n].addEventListener("click",s,!1);for(n=0;n<e.length;n++)e[n].addEventListener("click",function(e){var t=this.className,a=t.indexOf("active");-1==a?t+=" active":t=t.substr(0,a)+t.substr(a+"active".length),this.className=t},!1)};