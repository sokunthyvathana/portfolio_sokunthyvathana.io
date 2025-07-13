import React, { useEffect, useRef } from 'react';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { Code, Network, GraduationCap, Zap } from 'lucide-react';

gsap.registerPlugin(ScrollTrigger);

const About: React.FC = () => {
  const sectionRef = useRef<HTMLElement>(null);
  const skillsRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    const ctx = gsap.context(() => {
      gsap.fromTo('.about-text',
        { y: 50, opacity: 0 },
        {
          y: 0,
          opacity: 1,
          duration: 1,
          stagger: 0.2,
          scrollTrigger: {
            trigger: sectionRef.current,
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
          }
        }
      );

      gsap.fromTo('.skill-card',
        { x: -50, opacity: 0 },
        {
          x: 0,
          opacity: 1,
          duration: 0.8,
          stagger: 0.1,
          scrollTrigger: {
            trigger: skillsRef.current,
            start: 'top 80%',
            toggleActions: 'play none none reverse'
          }
        }
      );
    }, sectionRef);

    return () => ctx.revert();
  }, []);

  const skills = [
    { icon: Code, name: 'Web Development', desc: 'Laravel, Vite, Bootstrap, Tailwind CSS' },
    { icon: Network, name: 'Network Engineering', desc: 'GNS3, Router Configuration, Server Admin' },
    { icon: GraduationCap, name: 'Education', desc: 'SETEC Institute - Third Year IT Student' },
    { icon: Zap, name: 'Creative Suite', desc: 'Photoshop, Illustrator, Premiere Pro, After Effects' }
  ];

  return (
    <section ref={sectionRef} id="about" className="py-20 bg-gray-900">
      <div className="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-16">
          <h2 className="about-text text-4xl md:text-5xl font-bold text-white mb-6">
            About <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600">Me</span>
          </h2>
          <div className="about-text w-24 h-1 bg-gradient-to-r from-blue-400 to-purple-600 mx-auto"></div>
        </div>

        <div className="grid md:grid-cols-2 gap-12 items-center mb-16">
          <div className="space-y-6">
            <p className="about-text text-lg text-gray-300 leading-relaxed">
              I'm Sokunthy Vathana, a passionate third-year MANAGEMENT INFORMATION SYSTEMS student at SETEC Institute in Phnom Penh, Cambodia. 
              My journey in technology spans across multiple domains, with a strong focus on network engineering 
              and modern web development.
            </p>
            
            <p className="about-text text-lg text-gray-300 leading-relaxed">
              Currently, I'm deepening my expertise in web development using cutting-edge technologies like Laravel 
              and Vite, while also mastering network administration through hands-on experience with GNS3 simulations 
              and server management on both Ubuntu and Windows Server environments.
            </p>
            
            <p className="about-text text-lg text-gray-300 leading-relaxed">
              Beyond technical skills, I'm also passionate about creative design, utilizing the Adobe Creative Suite 
              to create compelling visual content. My goal is to bridge the gap between technical functionality 
              and aesthetic appeal in every project I undertake.
            </p>
          </div>

          <div className="about-text">
            <img
              src="https://images.pexels.com/photos/1181467/pexels-photo-1181467.jpeg?auto=compress&cs=tinysrgb&w=600"
              alt="Coding workspace"
              className="rounded-lg shadow-2xl"
            />
          </div>
        </div>

        <div ref={skillsRef} className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
          {skills.map((skill, index) => (
            <div
              key={index}
              className="skill-card bg-gray-800 p-6 rounded-lg hover:bg-gray-700 transition-all duration-300 hover:scale-105 hover:shadow-xl"
            >
              <skill.icon className="w-12 h-12 text-blue-400 mb-4" />
              <h3 className="text-xl font-semibold text-white mb-2">{skill.name}</h3>
              <p className="text-gray-400">{skill.desc}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

export default About;