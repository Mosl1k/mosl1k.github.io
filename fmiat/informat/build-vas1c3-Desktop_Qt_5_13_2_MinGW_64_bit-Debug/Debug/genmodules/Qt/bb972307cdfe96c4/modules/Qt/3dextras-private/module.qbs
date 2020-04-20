import '../QtModule.qbs' as QtModule

QtModule {
    qtModuleName: "3DExtras"
    Depends { name: "Qt"; submodules: ["core-private","3dcore-private","3drender-private","3dextras"]}

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
    cpp.includePaths: ["D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/Qt3DExtras/5.13.2","D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/Qt3DExtras/5.13.2/Qt3DExtras"]
    cpp.libraryPaths: []
    
}
