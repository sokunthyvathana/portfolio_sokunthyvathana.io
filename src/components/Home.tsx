import React, { useEffect, useRef } from 'react';
import { gsap } from 'gsap';
import { Github, Mail, Phone } from 'lucide-react';

const Home: React.FC = () => {
  const heroRef = useRef<HTMLDivElement>(null);
  const profileRef = useRef<HTMLImageElement>(null);
  const textRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const tl = gsap.timeline();
    
    tl.fromTo(profileRef.current,
      { scale: 0, rotation: 180 },
      { scale: 1, rotation: 0, duration: 1, ease: "back.out(1.7)" }
    )
    .fromTo(textRef.current?.children || [],
      { y: 50, opacity: 0 },
      { y: 0, opacity: 1, duration: 0.8, stagger: 0.2 }, "-=0.5"
    );

    // Floating animation for profile image
    gsap.to(profileRef.current, {
      y: -10,
      duration: 2,
      repeat: -1,
      yoyo: true,
      ease: "power2.inOut"
    });

    // Skills animation
    gsap.fromTo('.skills-container',
      { y: 50, opacity: 0 },
      { 
        y: 0, 
        opacity: 1, 
        duration: 1, 
        delay: 1.5,
        ease: "power2.out"
      }
    );

    gsap.fromTo('.skill-card',
      { y: 30, opacity: 0 },
      { 
        y: 0, 
        opacity: 1, 
        duration: 0.6, 
        stagger: 0.1,
        delay: 2,
        ease: "back.out(1.7)"
      }
    );

    // Animate skill progress circles
    setTimeout(() => {
      gsap.fromTo('.skill-progress',
        { strokeDasharray: '0 176' },
        { 
          strokeDasharray: (index, target) => {
            const skillLevel = parseInt(target.parentElement.parentElement.querySelector('span').textContent);
            return `${skillLevel * 1.76} 176`;
          },
          duration: 1.5,
          stagger: 0.1,
          ease: "power2.out"
        }
      );
    }, 2500);
  }, []);

  return (
    <section id="home" className="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-black to-gray-800 pt-20">
      <div ref={heroRef} className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        {/* Main Hero Section */}
        <div className="grid lg:grid-cols-2 gap-12 items-center mb-16">
          {/* Left Side - Text Content */}
          <div ref={textRef} className="space-y-6 text-center lg:text-left">
            <h1 className="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-4">
              Sokunthy <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600">Vathana</span>
            </h1>
            
            <p className="text-lg md:text-xl lg:text-2xl text-gray-300 mb-6">
              Third-year IT Student & Web Developer from Phnom Penh, Cambodia
            </p>
            
            <p className="text-base md:text-lg text-gray-400 mb-8 max-w-2xl lg:max-w-none">
              Passionate about network engineering and modern web development. 
              Currently specializing in Laravel, Vite, and network administration.
            </p>
            
            <div className="flex justify-center lg:justify-start space-x-6 mb-8">
              <a
                href="https://github.com/sokunthyvathana"
                target="_blank"
                rel="noopener noreferrer"
                className="flex items-center space-x-2 bg-gray-800 hover:bg-gray-700 px-6 py-3 rounded-full transition-all duration-300 hover:scale-105"
              >
                <Github size={20} />
                <span>GitHub</span>
              </a>
              <a
                href="mailto:sokunthyvathana@email.com"
                className="flex items-center space-x-2 bg-blue-600 hover:bg-blue-500 px-6 py-3 rounded-full transition-all duration-300 hover:scale-105"
              >
                <Mail size={20} />
                <span>Contact</span>
              </a>
            </div>
            
            <div className="animate-bounce lg:hidden">
              <svg
                className="w-6 h-6 text-gray-400 mx-auto"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth={2}
                  d="M19 14l-7 7m0 0l-7-7m7 7V3"
                />
              </svg>
            </div>
          </div>

          {/* Right Side - Profile Image */}
          <div className="flex justify-center lg:justify-end">
            <div className="relative">
              <img
                ref={profileRef}
                src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=400&h=400&dpr=2"
                alt="Sokunthy Vathana Profile"
                className="w-64 h-64 lg:w-80 lg:h-80 rounded-full object-cover border-4 border-blue-500 shadow-2xl"
              />
              {/* Decorative elements */}
              <div className="absolute -inset-4 bg-gradient-to-r from-blue-400 to-purple-600 rounded-full blur opacity-20 animate-pulse"></div>
              <div className="absolute top-4 right-4 w-6 h-6 bg-green-400 rounded-full border-4 border-white shadow-lg"></div>
            </div>
          </div>
        </div>

        {/* Scroll indicator for desktop */}
        <div className="hidden lg:block text-center">
          <div className="animate-bounce">
            <svg
              className="w-6 h-6 text-gray-400 mx-auto"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth={2}
                d="M19 14l-7 7m0 0l-7-7m7 7V3"
              />
            </svg>
          </div>
        </div>

        {/* Skills Section */}
        <div className="skills-container mt-20 max-w-4xl mx-auto">
          <h3 className="text-2xl md:text-3xl font-semibold text-white mb-8 text-center">
            Technical <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600">Skills</span>
          </h3>
          
          <div className="grid grid-cols-2 md:grid-cols-4 gap-6">
            {[
              { name: 'Laravel', level: 85, icon: '🚀' },
              { name: 'Vite', level: 80, icon: '⚡' },
              { name: 'Bootstrap', level: 90, icon: '🎨' },
              { name: 'Tailwind CSS', level: 88, icon: '💨' },
              { name: 'GNS3', level: 75, icon: '🌐' },
              { name: 'Network Admin', level: 82, icon: '🔧' },
              { name: 'Ubuntu Server', level: 78, icon: '🐧' },
              { name: 'Adobe Creative', level: 85, icon: '🎭' }
            ].map((skill, index) => (
              <div
                key={index}
                className="skill-card bg-gray-800/50 backdrop-blur-sm p-4 rounded-xl border border-gray-700/50 hover:border-blue-500/50 transition-all duration-300 hover:transform hover:scale-105"
              >
                <div className="text-center">
                  <div className="text-3xl mb-2">{skill.icon}</div>
                  <h4 className="text-white font-medium text-sm mb-3">{skill.name}</h4>
                  
                  {/* Progress Circle */}
                  <div className="relative w-16 h-16 mx-auto">
                    <svg className="w-16 h-16 transform -rotate-90" viewBox="0 0 64 64">
                      <circle
                        cx="32"
                        cy="32"
                        r="28"
                        stroke="currentColor"
                        strokeWidth="4"
                        fill="none"
                        className="text-gray-700"
                      />
                      <circle
                        cx="32"
                        cy="32"
                        r="28"
                        stroke="url(#gradient)"
                        strokeWidth="4"
                        fill="none"
                        strokeDasharray={`${skill.level * 1.76} 176`}
                        className="skill-progress transition-all duration-1000 ease-out"
                        strokeLinecap="round"
                      />
                    </svg>
                    <div className="absolute inset-0 flex items-center justify-center">
                      <span className="text-xs font-semibold text-blue-400">{skill.level}%</span>
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>
          
          {/* SVG Gradient Definition */}
          <svg className="absolute w-0 h-0">
            <defs>
              <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stopColor="#3b82f6" />
                <stop offset="100%" stopColor="#8b5cf6" />
              </linearGradient>
            </defs>
          </svg>
        </div>
      </div>
    </section>
  );
};

export default Home;