import React, { useRef, useEffect } from 'react';
import useMouse from '@react-hook/mouse-position';

import './style.css';

export default function CursorCircle ({children}) {
  const smallCursorRef = useRef(null);
  const iconContainerRef = useRef(null);

  const mouse = useMouse(iconContainerRef);

  useEffect(() => {
    document.addEventListener('mousemove', (e) => {
      function Run() {
        smallCursorRef.current.style.transform = `translate(${e.x}px, ${e.y}px)`;
      }

      Run();
      // requestAnimationFrame(Run);

      //  requestAnimationFrame(render);
    });
  }, []);
  // console.log(smallCursorRef);

  return (
   <>
   <div className="cursor cursor--small" ref={smallCursorRef}>
        <div className='cursor--small--inner'></div>
      </div>
      <canvas className="cursor cursor--canvas" />
   </>
      
    
  );
}
