/* eslint-disable max-len */
/* eslint-disable react/jsx-filename-extension */
import React from 'react';

import Fade from 'react-reveal/Fade';

import heroPortfolio from 'assets/images/gabungan.png';

export default function HeroPortfolio() {
  return (
    <section className="hero sm:items-center lg:items-start sm:flex-row">
      <Fade bottom>
        <div className="w-full sm:w-1/2 flex flex-col px-5 mb-5 sm:mb-0 sm:px-12 sm:mt-6 lg:mt-6 xl:mt-20">
          <h1 className="text-6xl text-theme-blue font-bold leading-tight mb-5">
            Galeri
          </h1>
          <p className="font-light text-xl text-gray-400 leading-relaxed">
          Dengan koleksi yang mencakup foto-foto gedung sekolah, dokumentasi acara-acara penting, dan kegiatan sehari-hari siswa.
          </p>
        </div>
        <div className="w-full sm:w-1/2 sm:pr-12">
          <img src={heroPortfolio} alt="Hero" />
        </div>
      </Fade>
    </section>
  );
}
