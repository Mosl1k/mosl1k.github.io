import '../QtModule.qbs' as QtModule

QtModule {
    qtModuleName: "3DQuick"
    Depends { name: "Qt"; submodules: ["core-private","gui-private","qml-private","quick-private","3dcore-private","3dquick"]}

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
    cpp.includePaths: ["D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/Qt3DQuick/5.13.2","D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/Qt3DQuick/5.13.2/Qt3DQuick"]
    cpp.libraryPaths: []
    
}
