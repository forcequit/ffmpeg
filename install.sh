#!/bin/bash

sudo apt-get update
sudo apt-get -y install autoconf automake build-essential libass-dev libfreetype6-dev \
    libsdl1.2-dev libtheora-dev libtool libva-dev libvdpau-dev libvorbis-dev libxcb1-dev libxcb-shm0-dev \
    libxcb-xfixes0-dev pkg-config texinfo zlib1g-dev

# Create a dir where the rest of the sources will live
mkdir ~/ffmpeg_sources

######### yasm ##########
sudo apt-get -y install yasm
# If your version of yasm is < 1.2.0,
# uncomment the following lines to get the lastest

# cd ~/ffmpeg_sources
# git clone --depth=1 --no-single-branch https://github.com/yasm/yasm.git
# cd yasm
# git checkout `git tag --list | tail -1` -b latest
# ./autogen
# ./configure --prefix="$HOME/ffmpeg_build" --bindir="$HOME/bin"
# make
# make install
# make distclean

###### libx264 ########
sudo apt-get -y install libx264-dev
# If your version of libx264-dev is less than 0.118,
# uncomment the following lines to get the latest

# cd ~/ffmpeg_sources
# wget http://download.videolan.org/pub/x264/snapshots/last_x264.tar.bz2
# tar xjvf last_x264.tar.bz2
# cd x264-snapshot*
# PATH="$HOME/bin:$PATH" ./configure --prefix="$HOME/ffmpeg_build" --bindir="$HOME/bin" --enable-static --disable-opencl
# PATH="$HOME/bin:$PATH" make
# make install
# make distclean

###### libx265 #######
sudo apt-get -y install cmake mercurial
cd ~/ffmpeg_sources
hg clone https://bitbucket.org/multicoreware/x265
cd ~/ffmpeg_sources/x265/build/linux
PATH="$HOME/bin:$PATH" cmake -G "Unix Makefiles" -DCMAKE_INSTALL_PREFIX="$HOME/ffmpeg_build" -DENABLE_SHARED:bool=off ../../source
make
make install
make distclean

###### libfdk-aac ########
cd ~/ffmpeg_sources
wget https://github.com/mstorsjo/fdk-aac/tarball/master -O fdk-aac.tar.gz
tar xzvf fdk-aac.tar.gz
cd mstorsjo-fdk-aac*
autoreconf -fiv
./configure --prefix="$HOME/ffmpeg_build" --disable-shared
make
make install
make distclean

####### libmp3lame ########
cd ~/ffmpeg_sources
wget https://sourceforge.net/projects/lame/files/latest/download -O liblamemp3
tar xzvf liblamemp3
cd lame-*
./configure --prefix="$HOME/ffmpeg_build" --enable-nasm --disable-shared
make
make install
make distclean

######### libopus #########
cd ~/ffmpeg_sources
git clone --depth=1 --no-single-branch https://github.com/xiph/opus.git
cd opus
git checkout `git tag --list | tail -1` -b latest
./autogen.sh
./configure --prefix="$HOME/ffmpeg_build" --disable-shared
make
make install
make clean

####### libvpx #########
cd ~/ffmpeg_sources
git clone --depth=1 --no-single-branch https://github.com/webmproject/libvpx.git
cd libvpx
git checkout `git tag --list | tail -1` -b latest
PATH="$HOME/bin:$PATH" ./configure --prefix="$HOME/ffmpeg_build" --disable-examples --disable-unit-tests
PATH="$HOME/bin:$PATH" make
make install
make clean

######## Finally install ffmpeg #########
cd ~/ffmpeg_sources
wget http://ffmpeg.org/releases/ffmpeg-snapshot.tar.bz2
tar xjvf ffmpeg-snapshot.tar.bz2
cd ffmpeg
PATH="$HOME/bin:$PATH" PKG_CONFIG_PATH="$HOME/ffmpeg_build/lib/pkgconfig" ./configure \
  --prefix="$HOME/ffmpeg_build" \
  --pkg-config-flags="--static" \
  --extra-cflags="-I$HOME/ffmpeg_build/include" \
  --extra-ldflags="-L$HOME/ffmpeg_build/lib" \
  --bindir="$HOME/bin" \
  --enable-gpl \
  --enable-libass \
  --enable-libfdk-aac \
  --enable-libfreetype \
  --enable-libmp3lame \
  --enable-libopus \
  --enable-libtheora \
  --enable-libvorbis \
  --enable-libvpx \
  --enable-libx264 \
  --enable-libx265 \
  --enable-nonfree
PATH="$HOME/bin:$PATH" make
make install
make distclean
hash -r
