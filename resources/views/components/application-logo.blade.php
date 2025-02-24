<svg width="500" height="150" viewBox="0 0 500 150" xmlns="http://www.w3.org/2000/svg">
    <defs>
      <linearGradient id="textGradient" x1="0%" y1="0%" x2="100%" y2="0%">
        <stop offset="0%" stop-color="#2B6CB0" />
        <stop offset="50%" stop-color="#4299E1" />
        <stop offset="100%" stop-color="#63B3ED" />
      </linearGradient>
  
      <filter id="glow">
        <feGaussianBlur stdDeviation="2" result="coloredBlur"/>
        <feMerge>
          <feMergeNode in="coloredBlur"/>
          <feMergeNode in="SourceGraphic"/>
        </feMerge>
      </filter>
  
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap');
        
        .title {
          font: 600 52px 'Orbitron', sans-serif;
          fill: url(#textGradient);
          text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
          letter-spacing: 2px;
        }
  
        .pulse {
          fill: none;
          stroke: url(#textGradient);
          stroke-width: 4;
          stroke-linecap: round;
          filter: url(#glow);
          animation: pulse 1.5s ease-in-out infinite;
        }
  
        @keyframes pulse {
          0% { stroke-width: 4; opacity: 1; }
          50% { stroke-width: 6; opacity: 0.8; }
          100% { stroke-width: 4; opacity: 1; }
        }
      </style>
    </defs>
  
    <rect width="500" height="150" fill="none" rx="8"/>
  
    <text x="50%" y="60%" class="title" text-anchor="middle" dominant-baseline="middle">
      <animate attributeName="opacity" values="1;0.9;1" dur="2s" repeatCount="indefinite"/>
      SkyPulse
    </text>
  
    <path class="pulse" d="M50 110 
                          Q125 90 200 110
                          Q275 130 350 100
                          Q425 70 450 110" 
          transform="translate(0 10)"/>
  

  </svg>