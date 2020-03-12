import '../QtModule.qbs' as QtModule

QtModule {
    qtModuleName: "PositioningQuick"
    Depends { name: "Qt"; submodules: ["quick-private","positioning-private","qml-private","core-private","positioningquick"]}

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
    cpp.includePaths: ["D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/QtPositioningQuick/5.13.2","D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/QtPositioningQuick/5.13.2/QtPositioningQuick"]
    cpp.libraryPaths: []
    
}
