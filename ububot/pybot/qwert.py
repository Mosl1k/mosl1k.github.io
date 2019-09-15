#!/usr/bin/python2
# Print RGB color values of screen pixel at location x, y
import gtk.gdk
import sys

#def PixelAt(x, y):
#    w = gtk.gdk.get_default_root_window()
#    sz = w.get_size()
#    pb = gtk.gdk.Pixbuf(gtk.gdk.COLORSPACE_RGB,False,8,sz[0],sz[1])
#    pb = pb.get_from_drawable(w,w.get_colormap(),0,0,0,0,sz[0],sz[1])
#    pixel_array = pb.get_pixels_array()
#    return pixel_array[y][x]

#print PixelAt(int(sys.argv[1]), int(sys.argv[2]))


def pixel_at(x, y):
    rw = gtk.gdk.get_default_root_window()
    pixbuf = gtk.gdk.Pixbuf(gtk.gdk.COLORSPACE_RGB, False, 8, 1, 1)
    pixbuf = pixbuf.get_from_drawable(rw, rw.get_colormap(), x, y, 0, 0, 1, 1)
    return tuple(pixbuf.pixel_array[0, 0])

print pixel_at(10, 10);