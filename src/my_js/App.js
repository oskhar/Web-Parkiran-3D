import * as THREE from '../../node_modules/three/build/three.module.js';
import { GLTFLoader } from '../../node_modules/three/examples/jsm/loaders/GLTFLoader.js';
import { AnalogControl } from './AnalogControl.js';
import * as Model from './Model.js';

// (main) Class
class App extends THREE.WebGLRenderer {

    // Constructor
    constructor () {

        // Atribute
        super();
        this.world = new MyWorld();
        this.eye = new MyEye(45, innerWidth/innerHeight, 1, 500);
        this.keyboard = [];
        this.analog = new AnalogControl();
        this.rangeSide = 3;
        this.homeLampOff = true;

        // Set latar
        this.latar = document.createElement('div');
        this.latar.id = "latar";
        this.latar.style.position = "absolute";
        this.latar.style.top = "0px";
        this.latar.style.width = innerWidth + "px";
        this.latar.style.height = innerHeight + "px";

        // Rendering
        this.shadowMap.enabled = true;
        this.shadowMap.type = THREE.BasicShadowMap;
        this.setSize(innerWidth, innerHeight);
        this.latar.appendChild(this.domElement);
        document.body.appendChild(this.latar);
        this.draw();

    }

    // Method
    draw () {

        this.action();
        this.render(this.world, this.eye);
        // this.world.blendObj.roted();
        requestAnimationFrame(this.draw.bind(this));

    }

    action () {

        // Action for move user & sun
        if (this.keyboard['w'] && this.eye.position.x > -32) {
            this.eye.gerakan(0.1);
        } else if (this.keyboard['s'] && this.eye.position.x < 32) {
            this.eye.gerakan(-0.1);
        }
        if (this.keyboard['a']) {
            this.eye.putar(-0.01);
        } else if (this.keyboard['d']) {
            this.eye.putar(0.01);
        }

        // Naik lantai

        if (this.keyboard['naik'] && this.eye.rangeRender == 0) {
            this.eye.rangeRender = 1;
        }
        if (this.eye.rangeRender != 0) {
            this.eye.ganti_lantai();
            this.eye.rangeRender = this.eye.rangeRender <= 50 ? this.eye.rangeRender + 1 : 0;
        }

        // Action analog control
        if (this.analog.touch) {
            this.keyboard = this.analog.keyboard;
        }

    }

}

// Class
class MyWorld extends THREE.Scene {

    // Constructor
    constructor () {

        // Atribute
        super();
        this.skybox = new THREE.CubeTextureLoader();
        this.skybox = this.skybox.load([
            './assets/images/px.png',
            './assets/images/nx.png',
            './assets/images/py.png',
            './assets/images/ny.png',
            './assets/images/pz.png',
            './assets/images/nz.png'
        ]);
        this.background = this.skybox;
        this.add(new THREE.AmbientLight(0xffffff, 0.25));


        // Create 3d object
        for (let i = 0; i < Object.keys(Model.objectData).length; i++) {
            this.addBlend(Model.objectData[i]['path'], Model.objectData[i]['position'], Model.objectData[i]['rotation'], Model.objectData[i]['scale']);
            
        }

        // Create lamp
        for (let i = 0; i < Object.keys(Model.lampData).length; i++) {
            this.addBlend(Model.lampData[i]['path'], Model.lampData[i]['position'], Model.lampData[i]['rotation'], Model.lampData[i]['scale'], false);
            this.addLamp(Model.lampData[i]['light'], Model.lampData[i]['color']);
        }

        // Check action area
        this.check();

        // Create action area
        for (let i = 0; i < Object.keys(this.isiParkir[0]).length; i++) {
            this.addAreaAction(this.isiParkir[0][i]['path'], this.isiParkir[0][i]['position'], this.isiParkir[0][i]['scale']);
            
        }

    }

    // Method
    check () {
        this.isiParkir = [[], [], []];
        for (let x = 0; x < 3; x++) {
            for (let i = 0; i < 14; i++) {
                this.isiParkir[x].push({
                    "status": "kosong",
                    "path": "./assets/images/Kosong.png",
                    "position": [31.5-(i*4.9), 2, -12],
                    "scale": [1, 3, 1]
                });
                this.isiParkir[x].push({
                    "status": "kosong",
                    "path": "./assets/images/Kosong.png",
                    "position": [31.5-(i*4.9), 2, 12],
                    "scale": [1, 3, 1]
                });
            }
        }
    }

    // Method
    addBlend (path, setp = [0, 0, 0], setr = [0, 0, 0], sets = [0, 0, 0], shadow = true) {

        new GLTFLoader().load(path, result => {

            this.blendObj = result.scene;
            if (shadow) {
                this.blendObj.traverse( function ( object ) {

                    if ( object.isMesh ) {
                        object.castShadow = true;
                        object.receiveShadow = true;
                    }

                });
            }
            this.blendObj.position.set(setp[0], setp[1], setp[2]);
            this.blendObj.rotation.set(setr[0], setr[1], setr[2]);
            this.blendObj.scale.x += sets[0];
            this.blendObj.scale.y += sets[1];
            this.blendObj.scale.z += sets[2];
            this.add(this.blendObj);

        });

    }

    // Method
    addAreaAction (path, setp, sets) {
        this.tmpTex = new THREE.TextureLoader().load(path);
        this.tmpMat = new THREE.SpriteMaterial({map: this.tmpTex});
        this.tmpSpr = new THREE.Sprite(this.tmpMat);
        this.tmpSpr.position.set(setp[0], setp[1], setp[2])
        this.tmpSpr.scale.x += sets[0];
        this.tmpSpr.scale.y += sets[1];
        this.tmpSpr.scale.z += sets[2];
        this.add(this.tmpSpr);
    }

}

// Class
class MyEye extends THREE.PerspectiveCamera {

    // Constructor
    constructor (fov, asp, nea, far) {

        super(fov, asp, nea, far);
        this.filmGauge = 4;
        this.position.y = 3;
        this.position.y = 3;
        this.rangeRender = 0;

    }

    // Method
    gerakan (corx) {
        this.position.x -= corx;
    }

    // Method
    putar (cory) {
        this.rotation.y -= cory;
    }

    // Method
    ganti_lantai () {
        
        if (this.rangeRender <= 50) {
            this.position.y += 0.5;
        }

    }

}

// Run
let run = new App();

// Keyboard control
document.body.onkeydown = function (e) {
    
    run.keyboard[e.key] = true;

    if (e.key == "o") {
        if (run.homeLampOff) {
            run.world.homeLamp.distance = 10;
            run.homeLampOff = false;
        } else {
            run.world.homeLamp.distance = 1;
            run.homeLampOff = true;
        }
    }

}

document.body.onkeyup = function (e) {
    run.keyboard[e.key] = false;
}

// User resize app
document.body.onresize = function () {
   run.setSize(innerWidth, innerHeight);
   run.eye.aspect = innerWidth/innerHeight;
   run.eye.updateProjectionMatrix();
};

// Analog control
window.touchAnalog = function(event) {
    let x = 0, y = 0;
    let tmpList = [ ['a', 'w'], ['w'], ['w', 'd'], ['a'], [' '], ['d'], ['a', 's'], ['s'], ['s', 'd'] ];

    if (event.touches && event.touches[0]) {
        x = event.touches[0].clientX;
        y = event.touches[0].clientY;
    } else if (event.originalEvent && event.originalEvent.changedTouches[0]) {
        x = event.originalEvent.changedTouches[0].clientX;
        y = event.originalEvent.changedTouches[0].clientY;
    } else if (event.clientX && event.clientY) {
        x = event.clientX;
        y = event.clientY;
    }

    for (let i = 0; i < 9; i++) {

        if (

            x > ((((i % 3) * Math.floor(innerWidth / 6) + (Math.ceil(i%3) * 20))+20) + (innerWidth / 2 - 50)) &&
            x < ((((i % 3 + 1) * Math.floor(innerWidth / 6) + (Math.ceil(i%3) * 20))+20) + (innerWidth / 2 - 50)) &&
            y > (innerHeight - innerWidth/2) + (Math.floor((i) / 3) * Math.floor(innerWidth/6)) &&
            y < (innerHeight - innerWidth/2) + (Math.floor((i) / 3 + 1) * Math.floor(innerWidth/6))

        ) {

            run.keyboard = [];
            for (let k = 0; k < tmpList[i].length; k++) {
                run.keyboard[tmpList[i][k]] = true;
            }

        }
        
    }
}
window.addEventListener('touchstart', touchAnalog, false);
window.addEventListener('touchmove', touchAnalog, false);
window.addEventListener('touchend', function (event) { run.keyboard = []; }, false);

// Mobile detect
window.mobileCheck = function() {
  let check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};

// Config mobile device
if (mobileCheck()) {
    run.analog.addToDom();
    run.rangeSide = 1;
}