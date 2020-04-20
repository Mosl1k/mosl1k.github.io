import '../QtModule.qbs' as QtModule

QtModule {
    qtModuleName: "OpenGLExtensions"
    Depends { name: "Qt"; submodules: ["openglextensions"]}

    architectures: ["x86_64"]
    targetPlatform: "windows"
    hasLibrary: false
    staticLibsDebug: []
    staticLibsRelease: []
    dynamicLibsDebug: []
    dynamicLibsRelease: []
    linkerFlagsDebug: []
    linkerFlagsRelease: []
    frameworksDebug: []
    frameworksRelease: []
    frameworkPathsDebug: []
    frameworkPathsRelease: []
    libNameForLinkerDebug: undefined
    libNameForLinkerRelease: undefined
    libFilePathDebug: undefined
    libFilePathRelease: undefined
    pluginTypes: []
    moduleConfig: []
    cpp.defines: []
    cpp.includePaths: ["D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/QtOpenGLExtensions/5.13.2","D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/QtOpenGLExtensions/5.13.2/QtOpenGLExtensions"]
    cpp.libraryPaths: []
    isStaticLibrary: true
}
