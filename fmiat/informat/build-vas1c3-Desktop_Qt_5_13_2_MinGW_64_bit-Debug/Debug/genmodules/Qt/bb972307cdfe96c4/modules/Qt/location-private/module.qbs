import '../QtModule.qbs' as QtModule

QtModule {
    qtModuleName: "Location"
    Depends { name: "Qt"; submodules: ["core-private","positioning-private","positioningquick-private","quick-private","positioning-private","positioningquick-private","qml-private","core-private","gui-private","positioningquick-private","location"]}

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
    cpp.includePaths: ["D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/QtLocation/5.13.2","D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/QtLocation/5.13.2/QtLocation"]
    cpp.libraryPaths: []
    
}
