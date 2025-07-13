import React, { useState, useEffect } from 'react';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Navigation from './components/Navigation';
import Home from './components/Home';
import About from './components/About';
import Portfolio from './components/Portfolio';
import Contact from './components/Contact';

gsap.registerPlugin(ScrollTrigger);

function App() {
  const [activeSection, setActiveSection] = useState('Home');

  useEffect(() => {
    // Smooth scrolling behavior
    gsap.registerPlugin(ScrollTrigger);
    
    // Update active section based on scroll position
    const sections = ['home', 'about', 'portfolio', 'contact'];
    
    sections.forEach(section => {
      ScrollTrigger.create({
        trigger: `#${section}`,
        start: 'top 50%',
        end: 'bottom 50%',
        onEnter: () => setActiveSection(section.charAt(0).toUpperCase() + section.slice(1)),
        onEnterBack: () => setActiveSection(section.charAt(0).toUpperCase() + section.slice(1))
      });
    });

    return () => {
      ScrollTrigger.getAll().forEach(trigger => trigger.kill());
    };
  }, []);

  return (
    <div className="bg-black text-white font-sans overflow-x-hidden">
      <Navigation activeSection={activeSection} setActiveSection={setActiveSection} />
      <main>
        <Home />
        <About />
        <Portfolio />
        <Contact />
      </main>
      
      {/* Footer */}
      <footer className="bg-gray-900 border-t border-gray-800 py-8">
        <div className="max-w-6xl mx-auto px-4 text-center">
          <p className="text-gray-400">
            © 2025 Sokunthy Vathana. Built with React, TypeScript, and GSAP.
          </p>
        </div>
      </footer>
    </div>
  );
}

export default App;