import '../QtModule.qbs' as QtModule

QtModule {
    qtModuleName: "3DRender"
    Depends { name: "Qt"; submodules: ["core-private","gui-private","3dcore-private","3drender","concurrent"]}

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
    cpp.includePaths: ["D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/Qt3DRender/5.13.2","D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/Qt3DRender/5.13.2/Qt3DRender"]
    cpp.libraryPaths: []
    
}
