import '../QtModule.qbs' as QtModule

QtModule {
    qtModuleName: "QuickControls2"
    Depends { name: "Qt"; submodules: ["quickcontrols2"]}

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
    cpp.includePaths: ["D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/QtQuickControls2/5.13.2","D:/Qt/Qt5.13.2/5.13.2/mingw73_64/include/QtQuickControls2/5.13.2/QtQuickControls2"]
    cpp.libraryPaths: []
    
}
