<template>
	<div>
	  <h1>Whack-a-mole! <span class="score" v-text="score">0</span></h1>
	  <div class="buttons">
	    <button class="btn btn-start" @click="startGame" v-show="timeUp">Start!</button>
	    <button @click="toggleButton" data-time="700" class="btn btn-level btn-medium">Medium</button>
	    <button @click="toggleButton" data-time="300" class="btn btn-level btn-expert">Expert</button>
	  </div>
	  <div class="game">
	    <div class="hole hole1">
	      <div class="mole" @click="bonk"></div>
	    </div>
	    <div class="hole hole2">
	      <div class="mole" @click="bonk"></div>
	    </div>
	    <div class="hole hole3">
	      <div class="mole" @click="bonk"></div>
	    </div>
	    <div class="hole hole4">
	      <div class="mole" @click="bonk"></div>
	    </div>
	    <div class="hole hole5">
	      <div class="mole" @click="bonk"></div>
	    </div>
	    <div class="hole hole6">
	      <div class="mole" @click="bonk"></div>
	    </div>
  </div>

    <div>
      <h1>High score: <span id="highscore" v-text="highscore">0</span></h1>
    </div>

	</div>
</template>

<script>
	export default{
		data() {
			return{
				timeUp: true,
				score: 0,
				highscore: 0,
				maxTime: 1000,
				holes: '',
				lastHole: '',
				previousActiveButton:'',
				minTime: 100
			};
		},

		created(){
			this.highscore = localStorage.getItem('highscore') || 0;
		},

		mounted(){
			this.holes = this.$el.querySelectorAll('.hole');
		},

		methods:{
			startGame(){
		      this.timeUp = false;
		      this.score = 0;
		      this.peep();
		      setTimeout(()=>{
		        this.timeUp = true;
		        if(this.score > this.highscore)
		          {
		            this.highscore = this.score;
		            localStorage.setItem("highscore", JSON.stringify(this.highscore));
		          }
		      },10000);
			},

			peep(){
				const time = this.randomTime(this.minTime, this.maxTime);
			    const hole = this.randomHole(this.holes);
			    hole.classList.add('up');

			    setTimeout(()=>{
			      hole.classList.remove('up');
			      if(!this.timeUp) this.peep();
			    },time);
			},

			randomTime(min, max){
				return Math.round(Math.random() * (max - min) + min);
			},

			randomHole(holes){
				const idx = Math.floor(Math.random() * holes.length);
			    const hole = this.holes[idx];
			    if(hole === this.lastHole){
			      return this.randomHole(this.holes);
			    }

			    this.lastHole = hole;
			    return hole;
			},

			bonk(e){
			  if(!e.isTrusted) return;
		      
		      e.target.classList.remove('up');
		      this.score++;
			},

			toggleButton(e){
				if(e.target.classList.contains('active'))
			        {
			          e.target.classList.remove('active');
			        }else{
			          e.target.classList.add('active');
			          if(this.maxTime != e.target.dataset.time || this.maxTime != 10000)
			          {
			            this.maxTime = e.target.dataset.time;
			            if(this.previousActiveButton != e.target && this.previousActiveButton)
			              this.previousActiveButton.classList.remove('active');
			          }
			        }
			        this.previousActiveButton = e.target;
			}
		}

	}
 </script>

<style>
	  .buttons{
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
    padding-top: 50px;
  }

  .btn{
    padding: 10px;
    margin: 0 10px;
    background: transparent;
    border: none;
    border-radius: 10%; 
    text-decoration: none;
    font-size: 50px;
    font-family: 'Amatic SC',sans-serif;
    font-weight: 800;
    border: 1px solid transparent;
  }
 
  .btn-start{
    color:#fff;
    background: #ff580f;
    border: 2px dashed;
  }

  .btn-level{
    border: 2px dashed ; 
  }

  .active{
     border: 4px dashed ;  
  }
  
  .btn-medium{
    background: #59e8ff;
  }

  .btn-expert{
  	background: #59ff66;
  }

  html {
  box-sizing: border-box;
  font-size: 10px;
  background: #ffc600;
}

*, *:before, *:after {
  box-sizing: inherit;
}

body {
  padding: 0;
  margin: 0;
  font-family: 'Amatic SC', cursive;
}

h1 {
  text-align: center;
  font-size: 10rem;
  line-height: 1;
  margin-bottom: 0;
}

.score {
  background: rgba(255,255,255,0.2);
  padding: 0 3rem;
  line-height: 1;
  border-radius: 1rem;
}

.game {
  width: 600px;
  height: 400px;
  display: flex;
  flex-wrap: wrap;
  margin: 0 auto;
}

.hole {
  flex: 1 0 33.33%;
  overflow: hidden;
  position: relative;
}

.hole:after {
  display: block;
  background: url("/images/secret/dirt.svg") bottom center no-repeat;
  background-size: contain;
  content: '';
  width: 100%;
  height:70px;
  position: absolute;
  z-index: 2;
  bottom: -30px;
}

.mole {
  background: url('/images/secret/mole.svg') bottom center no-repeat;
  background-size: 60%;
  position: absolute;
  top: 100%;
  width: 100%;
  height: 100%;
  transition:all 0.3s;
}

.hole.up .mole {
  top: 0;
}
</style>