
let cursor = document.querySelector("#cursor");
let main = document.querySelector("#main");
let page1 = document.querySelector("#page1");
let page2 = document.querySelector("#page2");
let page3 = document.querySelector("#page3");
let page4 = document.querySelector("#page4");

let smcursor = document.querySelector("#smallcursor");


// smcursor.innerHTML = "about";

main.addEventListener("mousemove",(det)=>{

    gsap.to(smcursor , {
        top:det.y - 90,
        left:det.x - 90,
    })
    
})

page2.addEventListener("onmouseenter",()=>{
    gsap.to(smcursor,{
        opacity:1,
        scale:1
    })
    smcursor.style.backgroundColor = "bisque",
    smcursor.style.color = "black"
    document.getElementById("smallcursor").innerHTML = "About";

})

page2.addEventListener("onmouseout",()=>{
    smcursor.style.display = "none";
    
    gsap.to(smcursor,{
        opacity:0,
        scale:0
    })

})

function landing(){

main.addEventListener("mousemove" , function(det){
    gsap.to(cursor , {
        top : det.y -  90,
        left : det.x -  90
    })
})
    
gsap.from("#nav" , {
    y:-50,
    delay:0.2,
    opacity:0
})
gsap.from("#page1 h1 , h2" , {
    y:80,
    delay:0.2,
    opacity:0
})

gsap.from("#page1 h4" , {
    y:80,
    delay:0.3,
    opacity:0
})

}

landing();

function about(){
    let aboutimg = document.querySelector("#about-img");

gsap.from(aboutimg , {
    x:-90,
    opacity:0.2,
    scrollTrigger:{
        trigger:aboutimg,
        scroller:"body",
        start : "top 60%",
        end:"top 81%",
        scrub : 1
    }
})

gsap.from("#about" , {
    x:90,
    opacity:0.2,
    scrollTrigger:{
        trigger:aboutimg,
        scroller:"body",
        start : "top 60%",
        end:"top 81%",
        scrub : 1
    }
})

gsap.from("#diarydive" , {
    scale:2,
    opacity:0,
    scrollTrigger:{
        trigger:"#diarydive",
        scroller:"body",
        start : "top 70%",
        end:"top 80%",
        scrub : 1
    }
})
}

about();

function topics(){
    gsap.from("#btn",{
        opacity:0,
        scrollTrigger:{
            trigger:"#btn",
            scroller:"body",
            start : "top 40%",
            end:"top 71%",
            scrub : 1
        }
    })
    
    gsap.from("#food",{
        x:-900,
        scrollTrigger:{
            
            trigger:"#sports",
            scroller:"body",
            start : "top 20%",
            end:"top 35%",
            scrub : 1
        }
    })
    
    gsap.from("#technology",{
        x:-900,
        scrollTrigger:{
            
            trigger:"#sports",
            scroller:"body",
            start : "top 30%",
            end:"top 55%",
            scrub : 1
        }
    })
    
    gsap.from("#coding",{
        x:-900,
        scrollTrigger:{
            
            trigger:"#sports",
            scroller:"body",
            start : "top 50%",
            end:"top 75%",
            scrub : 1
        }
    })
    gsap.from("#sports",{
        x:-900,
        scrollTrigger:{
            
            trigger:"#sports",
            scroller:"body",
            start : "top 70%",
            end:"top 95%",
            scrub : 1
        }
    })
}

topics();

function login(){
    gsap.from("#login",{
        opacity:0,
        y:90,
        delay:1,
        scrollTrigger:{
            trigger:"#login",
            scroller:"body",
            start : "top 40%",
            end:"top 61%",
            scrub : 1
        }
    })
}

login();

function showCustomAlert() {
    document.getElementById("customAlert").style.display = "block";
}

function closeCustomAlert() {
    document.getElementById("customAlert").style.display = "none";
}